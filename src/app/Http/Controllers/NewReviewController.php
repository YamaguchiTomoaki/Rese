<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewReviewRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Newreview;

class NewReviewController extends Controller
{
    public function newReview(Request $request)
    {
        $shopArray = Shop::where([
            ['id', '=', $request->shop_id],
        ])->with('area', 'genre')->get();

        $user = Auth::user();
        $user_id = $user['id'];
        $favorite = Favorite::where([
            ['user_id', '=', $user_id],
            ['shop_id', '=', $request->shop_id],
        ])->get();
        if ($favorite != "[]") {
            $shopArray[0]['favorite'] = 1;
        } else {
            $shopArray[0]['favorite'] = 0;
        }

        $newreview = Newreview::where([
            ['user_id', '=', $user_id],
            ['shop_id', '=', $request->shop_id],
        ])->get();
        if ($newreview != "[]") {
            $newreview_status = 1;
        } else {
            $newreview_status = 0;
        }
        return view('newreview', compact('shopArray', 'user_id', 'newreview_status'));
    }

    public function create(NewReviewRequest $request)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $newreview = Newreview::where([
            ['user_id', '=', $user_id],
            ['shop_id', '=', $request->shop_id],
        ])->get();
        // 戻るボタンを押した時の抜け道を防ぐ処理
        if ($newreview != "[]") {
            return redirect(route('newreview.newreview', [
                'shop_id' => $request->shop_id,
            ]));
        }

        if ($request->image != null) {
            $file_name = $request->file('image')->getClientOriginalName();
            if (! Storage::exists('public/' . $file_name)) {
                $request->file('image')->storeAs('public', $file_name);
            }
        } else {
            $file_name = null;
        }
        $newreview = [
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
            'image' => $file_name,
        ];
        Newreview::create($newreview);

        return redirect(route('shop.detail', [
            'shop_id' => $request->shop_id,
        ]));
    }

    public function list(Request $request)
    {
        $shopArray = Shop::where([
            ['id', '=', $request->shop_id],
        ])->with('area', 'genre')->get();

        $newreviews = Newreview::where([
            ['shop_id', '=', $request->shop_id],
        ])->with('user', 'shop')->get();
        $newreviewsCount = count($newreviews);

        return view('reviewlist', compact('shopArray', 'newreviews', 'newreviewsCount'));
    }

    public function edit(Request $request)
    {
        $newreview = Newreview::where([
            ['id', '=', $request->newreview_id],
        ])->with('user', 'shop.area', 'shop.genre')->get();
        $shopArray = $newreview[0]['shop'];

        $user = Auth::user();
        $user_id = $user['id'];
        $favorite = Favorite::where([
            ['user_id', '=', $user_id],
            ['shop_id', '=', $request->shop_id],
        ])->get();
        if ($favorite != "[]") {
            $shopArray['favorite'] = 1;
        } else {
            $shopArray['favorite'] = 0;
        }

        return view('editreview', compact('shopArray', 'user_id', 'newreview'));
    }

    public function update(NewReviewRequest $request)
    {
        if ($request->image != null) {
            $file_name = $request->file('image')->getClientOriginalName();
            if (! Storage::exists('public/' . $file_name)) {
                $request->file('image')->storeAs('public', $file_name);
            }
        } else if ($request->image_status != null) {
            $file_name = $request->image;
        } else {
            $file_name = null;
        }

        $newreview = [
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
            'image' => $file_name,
        ];

        Newreview::where([
            ['id', '=', $request->newreview_id],
        ])->update($newreview);

        return redirect(route('shop.detail', [
            'shop_id' => $request->shop_id,
        ]));
    }

    public function delete(Request $request)
    {
        Newreview::where([
            ['id', '=', $request->newreview_id],
        ])->delete();

        return redirect(route('shop.detail', [
            'shop_id' => $request->shop_id,
        ]));
    }

    public function  newreviewList(Request $request)
    {
        $shop = Shop::with('area', 'genre')->get();
        $shopCount = count($shop);

        return view('admin.admin_reviewlist', compact('shop', 'shopCount'));
    }

    public function adminreview(Shop $shop_id)
    {
        $shopArray = Shop::where([
            ['id', '=', $shop_id->id],
        ])->with('area', 'genre')->get();

        $newreviews = Newreview::where([
            ['shop_id', '=', $shop_id->id],
        ])->with('user', 'shop')->get();
        $newreviewsCount = count($newreviews);

        return view('admin.adminreview', compact('shopArray', 'newreviews', 'newreviewsCount'));
    }

    public function adminDelete(Request $request)
    {
        Newreview::where([
            ['id', '=', $request->newreview_id],
        ])->delete();

        return redirect(route('admin.newreview', [
            'shop_id' => $request->shop_id,
        ]));
    }
}
