<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Disposisi extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        $this->file = $details['lampiran'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(($this->file) != '-') {
            return $this->subject('Sekretariat Biofarmaka')->view('disposisi.disposisimail')
            ->attach(public_path('/file/suratmasuk/'.$this->file));
        }
        else {
            return $this->subject('Sekretariat Biofarmaka')->view('disposisi.disposisimail');
        }
    }
}
