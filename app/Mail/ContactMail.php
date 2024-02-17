<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    protected $path;


    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->path =$data->cv;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Feedback',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'contactmail',
            with: ['data'=>$this->data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromStorage(asset('/storage'."/". $this->data['cv'])),
            // Attachment::fromStorage('/storage'."/". $this->data['cv']),
            // Attachment::fromData(fn () => $this->data['cv'], 'cv.pdf')
            // ->withMime('application/pdf'),

            // Attachment::fromStorage('/storage/'.$this->path)
            //     ->as('cv.pdf')

                Attachment::fromPath('storage/'.$this->path )
                ->as('cv.pdf')
                ->withMime('application/pdf'),



        ];
    }
}
