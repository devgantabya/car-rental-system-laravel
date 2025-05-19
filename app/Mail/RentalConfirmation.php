<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentalConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Rental $rental)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Car Rental Confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.rental-confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}