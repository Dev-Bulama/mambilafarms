<?php

namespace App\Mail;

use App\Models\Investor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvestorStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public string $statusLabel;
    public string $statusMessage;
    public string $statusIcon;

    public function __construct(public readonly Investor $investor)
    {
        [$this->statusLabel, $this->statusMessage, $this->statusIcon] = match ($investor->status) {
            'approved'  => [
                'Approved',
                'Congratulations! Your subscription has been approved. Our investor relations team will contact you shortly with the SPV subscription agreement for signing.',
                '✅',
            ],
            'active'    => [
                'Investment Active',
                'Your investment is now active. Cattle have been allotted and RFID-tagged in your name. You will receive quarterly reports starting from Year 3.',
                '🟢',
            ],
            'suspended' => [
                'Account Suspended',
                'Your account has been temporarily suspended. Please contact our team at invest@legacyfarms.ng for clarification and next steps.',
                '⚠️',
            ],
            'completed' => [
                'Investment Completed',
                'Your investment term has been completed. Our team will contact you within 5 business days regarding your full settlement and returns.',
                '🏁',
            ],
            default     => [
                'Status Updated',
                'Your investment account status has been updated. Log in to your dashboard to see more details.',
                'ℹ️',
            ],
        };
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->statusIcon . ' Your Mambilla Legacy Farms Account: ' . $this->statusLabel,
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.investor-status-changed');
    }
}
