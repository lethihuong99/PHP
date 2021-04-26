<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Inquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiryPersonName;
    public $inquiry;
    public $inquiryPersonEmail;

    public function __construct($inquiryPersonName, $inquiryPersonEmail, $inquiry)
    {
        $this->inquiryPersonName = $inquiryPersonName;
        $this->inquiryPersonEmail = $inquiryPersonEmail;
        $this->inquiry = $inquiry;
    }
    public function build()
    {
        return $this->from($this->inquiryPersonEmail)
            ->subject("Contact From $this->inquiryPersonName")
            ->view('mails.inquiry', ['inquiry' => $this->inquiry]);
    }
}
