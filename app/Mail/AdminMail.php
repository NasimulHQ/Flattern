<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $sub;
    public $message;
    public $email;
    public function __construct($n, $s, $m, $e)
    {
        $this->name = $n;
        $this->sub = $s;
        $this->message = $m;
        $this->email = $e;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.email', [
            'name'=>$this->name,
            'message'=>$this->message,
            'email'=>$this->email,
        ])->subject($this->sub);
    }
}
