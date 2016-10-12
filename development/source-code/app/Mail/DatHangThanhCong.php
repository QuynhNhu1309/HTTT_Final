<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\GiaoDich;

class DatHangThanhCong extends Mailable
{
    use Queueable, SerializesModels;

    protected $giaoDich;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GiaoDich $giaoDich)
    {
        $this->giaoDich=$giaoDich;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo đặt hàng thành công #'.$giaoDich->id)
                    ->view('emails.giao-dich.dat-hang-thanh-cong')
                    ->with(['giaoDich'=>$giaoDich]);
    }
}
