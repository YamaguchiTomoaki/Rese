<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = [
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
        ];
        Favorite::create($favorite);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        Favorite::where([
            ['user_id', '=', $request->user_id],
            ['shop_id', '=', $request->shop_id],
        ])->delete();

        return redirect('/');
    }
}
