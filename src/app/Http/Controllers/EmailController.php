<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;

class EmailController extends Controller
{
    public function emailView()
    {
        return view('admin.admin_email');
    }

    public function emailSend(NotificationRequest $request)
    {
        $users = User::all();
        $userCount = count($users);
        for ($id = 0; $id < $userCount; $id++) {
            $user['email'] = $users[$id]['email'];
            $user['name'] = $users[$id]['name'];
            $user['subject'] = $request->subject;
            $user['maintext'] = $request->maintext;
            Mail::to($user['email'])->send(new NotificationEmail($user));
        }
        return redirect('/admin');
    }
}
