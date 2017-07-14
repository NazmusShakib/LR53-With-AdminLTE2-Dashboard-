<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TestMailController extends Controller
{
    public function mailPage()
    {
        return view('mail-test');
    }

    public function sendMail()
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new TestMail($user, 'secret'));
        }

        Session::flash('message_success', 'Mail has been sent successfully.');
        return back();
    }
}
