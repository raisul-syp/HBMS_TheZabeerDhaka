<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Spatie\Permission\Models\Role;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminRegisterMailable extends Mailable
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
        $roles = Role::all()->where('is_active', 1)->where('is_delete', 1);
        $subject = "User Registration";
        return $this->from('info@thezabeerdhaka.com', 'The Zabeer Dhaka User Registration')
                    ->to($this->data['user_email'])
                    ->subject($subject)
                    ->with($this->data)
                    ->view('mail-template.admin-register', compact('roles'));
    }
}
