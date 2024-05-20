<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $totalPrice;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $totalPrice
     * @return void
     */
    public function __construct($user, $totalPrice)
    {
        $this->user = $user;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Successful')
                    ->view('emails.payment_success');
    }
}


