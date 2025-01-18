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

        return view('newreview', compact('shopArray', 'user_id'));
    }

    public function create(NewReviewRequest $request)
    {
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

    public function list()
    {
        return view('reviewlist');
    }
}
