<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuestRegisterMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Guest Registration";
        return $this->from('info@thezabeerdhaka.com', 'The Zabeer Dhaka Guest Registration')
                    ->to($this->data['guest_email'])
                    ->subject($subject)
                    ->with($this->data)
                    ->view('mail-template.guest-register');
    }
}
