<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopEditRequest;
use App\Models\Area;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Newreview;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();

        if ($user != null) {
            $favorite = Favorite::where([
                ['user_id', '=', $user['id']],
            ])->orderBy('shop_id')->get();
            $favoriteCount = count($favorite);
            $user_id = $user['id'];
        } else {
            $favorite = null;
            $user_id = null;
        }
        $shop = Shop::with('area', 'genre')->get();
        $shopArray = $shop->toArray();
        $shopCount = count($shopArray);
        if ($user != null && $favoriteCount != 0) {
            for ($id = 0; $id < $shopCount; $id++) {
                for ($favoriteId = 0; $favoriteId < $favoriteCount; $favoriteId++) {
                    if ($shopArray[$id]['id'] == $favorite[$favoriteId]['shop_id']) {
                        $shopArray[$id]['favorite'] = 1;
                        break;
                    } else if ($favoriteId == $favoriteCount - 1) {
                        $shopArray[$id]['favorite'] = 0;
                    }
                }
            }
        } else {
            for ($id = 0; $id < $shopCount; $id++) {
                $shopArray[$id]['favorite'] = 0;
            }
        }
        for ($id = 0; $id < $shopCount; $id++) {
            $shopArray[$id]['area'] = $shopArray[$id]['area']['area'];
            $shopArray[$id]['genre'] = $shopArray[$id]['genre']['genre'];
        }

        return view('index', compact('shopArray', 'shopCount', 'areas', 'genres', 'user_id'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        $newreviews = Newreview::all();
        $newreviewsCount = count($newreviews);


        $shop = Shop::with('area', 'genre')->AreaSearch($request->area)->GenreSearch($request->genre)->ShopSearch($request->name)->get();

        if ($user != null) {
            $favorite = Favorite::where([
                ['user_id', '=', $user['id']],
            ])->orderBy('shop_id')->get();
            $favoriteCount = count($favorite);
            $user_id = $user['id'];
        } else {
            $favorite = null;
            $user_id = null;
        }
        $shopArray = $shop->toArray();
        $shopCount = count($shopArray);
        if ($user != null && $favoriteCount != 0) {
            for ($id = 0; $id < $shopCount; $id++) {
                for ($favoriteId = 0; $favoriteId < $favoriteCount; $favoriteId++) {
                    if ($shopArray[$id]['id'] == $favorite[$favoriteId]['shop_id']) {
                        $shopArray[$id]['favorite'] = 1;
                        break;
                    } else if ($favoriteId == $favoriteCount - 1) {
                        $shopArray[$id]['favorite'] = 0;
                    }
                }
            }
        } else {
            for ($id = 0; $id < $shopCount; $id++) {
                $shopArray[$id]['favorite'] = 0;
            }
        }
        for ($id = 0; $id < $shopCount; $id++) {
            $shopArray[$id]['area'] = $shopArray[$id]['area']['area'];
            $shopArray[$id]['genre'] = $shopArray[$id]['genre']['genre'];
            $shopArray[$id]['evaluation'] = null;
            $shopArray[$id]['evaluationcount'] = 0;
            $shopArray[$id]['evaluationtotal'] = 0;
        }

        for ($id = 0; $id < $shopCount; $id++) {
            for ($n_id = 0; $n_id < $newreviewsCount; $n_id++) {
                if ($shopArray[$id]['id'] == $newreviews[$n_id]['shop_id']) {
                    $shopArray[$id]['standby'] = $newreviews[$n_id]['evaluation'];
                    $shopArray[$id]['evaluationcount'] += 1;
                    $shopArray[$id]['evaluationtotal'] += $shopArray[$id]['standby'];
                    $shopArray[$id]['evaluation'] = $shopArray[$id]['evaluationtotal'] / $shopArray[$id]['evaluationcount'];
                }
            }
        }

        if ($request->sort == 1) {
            shuffle($shopArray);
        } else if ($request->sort == 2) {
            foreach ($shopArray as $key => $value) {
                $sort_keys[$key] = $value['evaluation'];
            }
            array_multisort($sort_keys, SORT_DESC, $shopArray);
        } else if ($request->sort == 3) {
            foreach ($shopArray as $key => $value) {
                // 無評価のものを最後尾に表示するため
                if ($value['evaluation'] == null) {
                    $sort_keys[$key] = 6;
                } else {
                    $sort_keys[$key] = $value['evaluation'];
                }
            }
            array_multisort($sort_keys, SORT_ASC, $shopArray);
        }

        return view('index', compact('shopArray', 'shopCount', 'areas', 'genres', 'user_id'));
    }

    public function detail(Shop $shop_id)
    {
        $shopArray = $shop_id->toArray();

        $area = Area::find($shopArray['areas']);
        $genre = Genre::find($shopArray['genres']);

        $shopArray['area'] = $area['area'];
        $shopArray['genre'] = $genre['genre'];

        $user = Auth::user();
        if ($user != null) {
            $newreview = Newreview::where([
                ['user_id', '=', $user['id']],
                ['shop_id', '=', $shopArray['id']],
            ])->with('user', 'shop')->get();
            if ($newreview != "[]") {
                $newreview_status = 1;
            } else {
                $newreview_status = 0;
            }
        } else {
            $newreview = null;
            $newreview_status = 0;
        }

        return view('detail', compact('shopArray', 'newreview', 'newreview_status'));
    }

    public function create(ShopCreateRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        if (! Storage::exists('public/' . $file_name)) {
            $request->file('image')->storeAs('public', $file_name);
        }
        $shop = [
            'representative_id' => $request->representative_id,
            'name' => $request->name,
            'areas' => $request->areas,
            'genres' => $request->genres,
            'overview' => $request->overview,
            'image' => $file_name,
        ];
        Shop::create($shop);

        return redirect('/representative');
    }

    public function update(ShopEditRequest $request)
    {
        if ($request->image == null) {
            $shop = [
                'name' => $request->name,
                'areas' => $request->areas,
                'genres' => $request->genres,
                'overview' => $request->overview,
            ];
        } else {
            $file_name = $request->file('image')->getClientOriginalName();
            if (! Storage::exists('public/' . $file_name)) {
                $request->file('image')->storeAs('public', $file_name);
            }

            $shop = [
                'name' => $request->name,
                'areas' => $request->areas,
                'genres' => $request->genres,
                'overview' => $request->overview,
                'image' => $file_name,
            ];
        }

        Shop::where([
            ['id', '=', $request->shop_id],
        ])->update($shop);

        return redirect('/representative');
    }
}
