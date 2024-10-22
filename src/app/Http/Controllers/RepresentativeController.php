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


class RepresentativeController extends Controller
{
    public function create(RepresentativeRegisterRequest $request)
    {
        $representative = [
            'shop_id' => $request->shop_id,
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
        return view('representative.representative_index');
    }
}
