<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminRentalNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Rental $rental)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Car Rental Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.admin-rental-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}