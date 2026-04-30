<?php

namespace App\Mail;

use App\Models\Investor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvestorRegisteredConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Investor $investor) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Mambilla Legacy Farms Registration — Ref: ' . $this->investor->reference_number,
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.investor-registered-confirmation');
    }
}
