<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepresentativeLoginRequest;
use App\Http\Requests\RepresentativeRegisterRequest;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;

class RepresentativeController extends Controller
{
    public function create(RepresentativeRegisterRequest $request)
    {
        $representative = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        Representative::create($representative);
        return redirect('/admin');
    }

    public function view(): View
    {
        return view('representative.representative_login');
    }

    /**
     * ログイン
     */
    public function store(RepresentativeLoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(route('representative'));
    }

    /**
     * ログアウト
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('representative')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('representative.login');
    }

    public function index()
    {
        $representative = Auth::guard('representative')->user();
        return view('representative.representative_index', compact('representative'));
    }

    public function createView(Request $request)
    {
        $representative_id = $request->representative_id;
        $areas = Area::all();
        $genres = Genre::all();
        return view('representative.representative_create', compact('representative_id', 'areas', 'genres'));
    }

    public function editList(Request $request)
    {
        $shop = Shop::where([
            ['representative_id', '=', $request->representative_id],
        ])->with('area', 'genre')->get();
        $shopCount = count($shop);
        return view('representative.edit_list', compact('shop', 'shopCount'));
    }

    public function edit(Shop $shop_id)
    {
        $areas = Area::all();
        $genres = Genre::all();

        $shopArray = $shop_id->toArray();

        $area = Area::find($shopArray['areas']);
        $genre = Genre::find($shopArray['genres']);

        $shopArray['area'] = $area['area'];
        $shopArray['genre'] = $genre['genre'];
        return view('representative.representative_edit', compact('shopArray', 'areas', 'genres'));
    }

    public function reservationList(Request $request)
    {
        $shop = Shop::where([
            ['representative_id', '=', $request->representative_id],
        ])->with('area', 'genre')->get();
        $shopCount = count($shop);
        return view('representative.reservation_list', compact('shop', 'shopCount'));
    }

    public function reservationView(Shop $shop_id)
    {
        $reservation = Reservation::where([
            ['shop_id', '=', $shop_id->id],
        ])->with('user:id,name,email')->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        if ($reservation == '[]') {
            $reservation = 'null';
            $reservationCount = 'null';
        } else {
            $reservationCount = count($reservation);
            for ($id = 0; $id < $reservationCount; $id++) {
                if ($reservation[$id]['visit_flag'] == 1) {

                    $reservation[$id]['visit_flag'] = '来店済み';
                } else {
                    $reservation[$id]['visit_flag'] = '来店待ち';
                }

                if ($reservation[$id]['payment_flag'] == 1) {
                    $reservation[$id]['payment_flag'] = '決済済み';
                } else {
                    $reservation[$id]['payment_flag'] = '未決済';
                }
                $headstr = substr($reservation[$id]['time'], 0, 1);
                if ($headstr != "0") {
                    $reservation[$id]['time'] = substr($reservation[$id]['time'], 0, 5);
                } else {
                    $reservation[$id]['time'] = substr($reservation[$id]['time'], 1, 4);
                }
            }
        }

        return view('representative.representative_reservation', compact('reservation', 'reservationCount', 'shop_id'));
    }
}
