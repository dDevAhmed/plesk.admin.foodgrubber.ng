<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailFromAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $storeName;

    public function __construct($storeName)
    {
        $this->storeName = $storeName;
    }

    // public function build(MimeMessage $message)
    // {
    //     $message->subject('Your FoodGrubber Store is Activated!');

    //     $message->from('info@foodgrubber.com', 'FoodGrubber Team'); // Replace with your sender details

    //     $message->htmlView('mail.store-activated', [
    //         'storeName' => $this->storeName,
    //     ]);

    //     return $message;
    // }

    /**
     * Create a new message instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Store Activated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.store-activated',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
