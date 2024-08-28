<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
    {
        $user = Auth::user();
        $reservation = [
            'user_id' => $user['id'],
            'shop_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];
        Reservation::create($reservation);
        return view('done');
    }

    public function cancel(Request $request)
    {
        $test = $request->reservation_id;
        Reservation::where([
            ['id', '=', $request->reservation_id],
        ])->delete();

        return redirect('/mypage');
    }
}
