<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;
    public $forAdmin;

    public function __construct(Rental $rental, $forAdmin = false)
    {
        $this->rental = $rental;
        $this->forAdmin = $forAdmin;
    }

    public function build()
    {
        if ($this->forAdmin) {
            return $this->view('send_mail.rental_details')
                        ->subject('New Car Rental Alert')
                        ->with(['rental' => $this->rental]);
        } else {
            return $this->view('send_mail.customer')
                        ->subject('Your Car Rental Details')
                        ->with(['rental' => $this->rental]);
        }
    }
}
