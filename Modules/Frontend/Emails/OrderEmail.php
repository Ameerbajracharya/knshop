<?php

namespace Modules\Frontend\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Frontend\Entities\Order;

class orderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $confirm_mail;
    public function __construct(Order $confirm_mail)
    {
        $this->confirm_mail = $confirm_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend::email.orderemail');
    }
}
