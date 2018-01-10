<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformMail extends Mailable implements ShouldQueue
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
        $this->from($this->data['email']);
        $this->subject('Nouvelle application [ ' . $this->data['firstname'] . ' ' . $this->data['lastname'] . ' ]');

        foreach ($this->data['files'] as $file) {
            $this->attach($file);
        }
        return $this->markdown('emails.sendit');
    }
}
