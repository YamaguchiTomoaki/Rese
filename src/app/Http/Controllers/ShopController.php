<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopEditRequest;
use App\Models\Area;
use App\Models\Favorite;
use App\Models\Genre;
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
            //shop_idで順で取得　※必要あれば修正
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

        $shop = Shop::with('area', 'genre')->AreaSearch($request->area)->GenreSearch($request->genre)->ShopSearch($request->name)->get();

        if ($user != null) {
            //shop_idで順で取得　※必要あれば修正
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
        if ($user != null) {
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

    public function detail(Shop $shop_id)
    {
        $shopArray = $shop_id->toArray();

        $area = Area::find($shopArray['areas']);
        $genre = Genre::find($shopArray['genres']);

        $shopArray['area'] = $area['area'];
        $shopArray['genre'] = $genre['genre'];
        return view('detail', compact('shopArray'));
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
