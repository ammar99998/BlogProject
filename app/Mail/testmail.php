<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class testmail extends Mailable
{
    use Queueable, SerializesModels;
public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name=$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mailForm');
        return $this->markdown('mailForm');/// mark to show the massage by better appearnse
    }
}
