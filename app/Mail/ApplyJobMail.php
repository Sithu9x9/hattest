<?php

namespace App\Mail;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplyJobMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mail;
    public $fileData;
    public Career $career;

    /**
     * Create a new message instance.
     */
    public function __construct($mail, $fileData, $career)
    {
        $this->mail = $mail;
        $this->fileData = $fileData;
        $this->career = $career;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->mail['email']),
            subject: 'Applying Job For - ' . $this->career->position . ' Position',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.apply-job-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $fileData = json_decode($this->fileData, true);
        $fileContent = base64_decode($fileData['content']);

        return [
            Attachment::fromData(fn () => $fileContent, $fileData['name'])
                ->withMime($fileData['mime']),
        ];
    }
}
