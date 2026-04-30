<?php

namespace App\Mail;

use App\Models\Investor;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvestorRegisteredAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Investor $investor) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🐄 New Investor Registration — ' . $this->investor->full_name . ' · ' . $this->investor->tier . ' Tier',
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.investor-registered-admin');
    }
}
