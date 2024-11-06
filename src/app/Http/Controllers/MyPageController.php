<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class MyPageController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $user_name = $user['name'];
        $area = Area::all();
        $areaCount = count($area);
        $genre = Genre::all();
        $genreCount = count($genre);
        $date = Carbon::now()->format('Y-m-d');
        $reservation = Reservation::with('shop:id,name,areas,genres,overview,image')->where([
            ['user_id', '=', $user['id']],
            ['date', '>=', $date],
        ])->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        $reservationArray = $reservation->toArray();
        $reservationCount = count($reservationArray);

        $favorite = Favorite::with('shop:id,name,areas,genres,overview,image')->where([
            ['user_id', '=', $user['id']],
        ])->get();
        $favoriteArray = $favorite->toArray();
        $favoriteCount = count($favoriteArray);

        for ($id = 0; $id < $favoriteCount; $id++) {
            for ($area_id = 0; $area_id < $areaCount; $area_id++) {
                if ($favoriteArray[$id]['shop']['areas'] == $area[$area_id]['id']) {
                    $favoriteArray[$id]['shop']['area'] = $area[$area_id]['area'];
                    break;
                }
            }
        }
        for ($id = 0; $id < $favoriteCount; $id++) {
            for ($genre_id = 0; $genre_id < $genreCount; $genre_id++) {
                if ($favoriteArray[$id]['shop']['genres'] == $genre[$genre_id]['id']) {
                    $favoriteArray[$id]['shop']['genre'] = $genre[$genre_id]['genre'];
                    break;
                }
            }
        }
        return view('mypage', compact('reservationArray', 'reservationCount', 'favoriteArray', 'favoriteCount', 'user_id', 'user_name'));
    }
}
