<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Maildevis extends Mailable
{
    public $mailData;
    use Queueable, SerializesModels;



    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('fmsi.plomberie18@gmail.com','FMSI')
            ->subject('FMSI PLOMBERIE')
            ->view('emails.devistemplate')
            ->with('mailData', $this->mailData);
    }
}
