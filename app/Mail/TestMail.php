<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable implements  ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = env('ADMINISTRATOR_EMAIL');
        $name = 'Nazmus Shakib';
        $subject = 'Test Mail';

        return $this->view('emails.test-mail')
            ->from($from, $name)
            ->subject($subject);

        //return $this->view('view.name');
    }
}
