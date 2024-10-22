<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Batch;
use App\Jobs\SendReminderEmail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class ReservationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reservation-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Mailer $mailer)
    {
        logger()->info('This is WriteLog Command.');

        $date = Carbon::now()->format('Y-m-d');
        $reservations = Reservation::with('user')->where([
            ['date', '=', $date],
        ])->get();
        $reservationsCount = count($reservations);
        for ($id = 0; $id < $reservationsCount; $id++) {
            $users[$id] = $reservations[$id]['user'];
            $reservation = $reservations[$id];
            $mailer->to($users[$id]['email'])
                ->send(new ReminderEmail($reservation));
        }
    }
}
