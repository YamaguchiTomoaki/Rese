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
            'visit_flag' => false,
        ];
        Reservation::create($reservation);
        return view('done');
    }

    public function cancel(Request $request)
    {
        Reservation::where([
            ['id', '=', $request->reservation_id],
        ])->delete();

        return redirect('/mypage');
    }

    public function change(Request $request)
    {
        $reservation = Reservation::with('shop:id,name')->where([
            ['id', '=', $request->reservation_id],
        ])->get();
        $reservationArray = $reservation->toArray();
        $headstr = substr($reservationArray[0]['time'], 0, 1);
        return view('change', compact('reservationArray', 'headstr'));
    }

    public function update(ReservationRequest $request)
    {
        $reservation = [
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];
        Reservation::find($request->id)->update($reservation);

        return redirect('/mypage');
    }
}
