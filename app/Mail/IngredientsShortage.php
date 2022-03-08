<?php

namespace App\Mail;

use App\Models\Ingrediant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IngredientsShortage extends Mailable
{
    use Queueable, SerializesModels;

    public $ingrediant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ingrediant $ingrediant)
    {
        $this->ingrediant = $ingrediant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.shortage');
    }
}
