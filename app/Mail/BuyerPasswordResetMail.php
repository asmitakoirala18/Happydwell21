<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BuyerPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sendInfo;

    public function __construct($data)
    {
        $this->sendInfo = [$data];
    }


    public function build()
    {

        $this->from($this->sendInfo[0]['email'])
            ->subject('password reset')
            ->view('mail.buyer-password-reset-mail')
            ->with('sellerInfo', $this->sendInfo);

    }
}
