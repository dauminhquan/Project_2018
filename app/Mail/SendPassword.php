<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $user_name;
    private $password;
    public function __construct($user_name,$password)
    {

        $this->user_name = $user_name;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from("acv12345.email@gmail.com")->subject("Gửi mật khẩu")->view('sendpassword')->with(["user_name"=>$this->user_name,"password" => $this->password]);
    }
}
