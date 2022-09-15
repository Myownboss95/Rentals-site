<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $mailMessage, public $files = [])
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $mail = $this;
        foreach ($this->files as $key => $file) {
            if (!is_null($file)) {
                $mail->attachData($file->get(), $file->getClientOriginalName());
            }
        }
        $mail->markdown('emails.send-mail');
        return $mail;
    }
}
