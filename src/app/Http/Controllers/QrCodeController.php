<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function qrView(Request $request)
    {
        $reservation = Reservation::with('shop:id,name')->where([
            ['id', '=', $request->reservation_id],
        ])->get();
        //$qrCode = QrCode::size(200)->generate($reservation);
        $reservation_id = $request->reservation_id;
        $qrCode = QrCode::size(200)->generate("http://localhost/qrcode/$reservation_id");
        return view('qrcode', compact('qrCode'));
    }

    public function visit(Reservation $reservation_id)
    {
        $reservation = [
            'visit_flag' => true,
        ];
        Reservation::find($reservation_id['id'])->update($reservation);
        return redirect('/mypage');
    }
}
