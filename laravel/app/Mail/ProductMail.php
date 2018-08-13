<?php

namespace App\Mail;

use App\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@domain.com')->view('emails.product');
    }
}
