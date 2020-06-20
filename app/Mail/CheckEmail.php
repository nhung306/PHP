<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckEmail extends Mailable
{
    use Queueable, SerializesModels;
      public $user_db;
      public $billMailInfo;
      public $totalQuanty;
      public $totalPrice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_db,$billMailInfo,$totalQuanty,$totalPrice)
    {
       $this->user_db = $user_db;
       $this->billMailInfo = $billMailInfo;
       $this->totalQuanty = $totalQuanty;
       $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('buiduy057@gmail.com')
        ->subject('Đơn hàng')
        ->view(
            'users.mail.test'
            ,
            [
                'user_db' => $this->user_db,
                'billMailInfo' => $this->billMailInfo,
                'totalQuanty' => $this->totalQuanty,
                'totalPrice' => $this->totalPrice 
            ]
        );
    }
    // thu xem sao
}
