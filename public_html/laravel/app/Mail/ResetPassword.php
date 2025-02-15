<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $data;

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
        return $this->from($this->data['emailweb'])
        ->view('email/resetpassword')
        ->with(
         [
            'nama' => $this->data['nama'],
            'email' => $this->data['email'],
             'password' => $this->data['password'],
             'namaweb' => $this->data['namaweb'],
             'emailweb' => $this->data['emailweb']
         ]);
    }
}
