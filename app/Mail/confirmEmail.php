<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Frontend\Entities\Order;
use Modules\Setting\Entities\Setting;

class confirmEmail extends Mailable
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
        $data['about'] = Setting::first();
        return $this->view('confirmEmail',compact('data'));
    }
}
