<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $bill;

    public function __construct($title, $bill)
    {
        $this->title = $title;
        $this->bill = $bill;
    }
    public function build()
    {
        return $this->from(config('mail.address'))
            ->subject($this->title)
            ->view('mails.order', ['bill' => $this->bill]);
    }
}
