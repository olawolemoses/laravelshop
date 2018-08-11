<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     
     public $user;
     public $token;
     
    public function __construct($user,$code)
    {
        //
        $this->user = $user;
        $this->token = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = "http://honeydrops.sbscnigeria.com/adminpassword?code=" . $this->token . "&email=" . $this->user->username;
        
        return $this->subject("Honeydrops Admin:Forgot Password")->view('admin.email.forgotpassword', compact('url'));
       // return $this->view('view.name');
    }
}
