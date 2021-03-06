<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    private $form_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_data)
    {
        //
        $this->form_data = $form_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('dev@vladko.dev', 'vladko.dev')
            ->subject('New message from ' . $this->form_data['first_name'] . ' ' . $this->form_data['last_name'])
            ->markdown('emails.contact')
            ->with($this->form_data);
    }
}
