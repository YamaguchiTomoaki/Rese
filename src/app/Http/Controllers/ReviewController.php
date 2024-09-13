<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $shop_id = $request->shop_id;
        return view('review', compact('shop_id'));
    }

    public function create(ReviewRequest $request)
    {

        $shop_id = $request->shop_id;
        $user = Auth::user();
        $review  = [
            'user_id' => $user['id'],
            'shop_id' => $shop_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ];
        Review::create($review);
        return redirect(route('shop.detail', [
            'shop_id' => $shop_id,
        ]));
    }
}
