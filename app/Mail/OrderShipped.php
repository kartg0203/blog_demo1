<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    protected $str = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($str)
    {

        $this->str = $str;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->str);
        // 執行這裡的邏輯
        return $this->view('emails.order', ['str' => $this->str]);
    }
}
