<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvioEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $codigo;
    public $email;
    public function __construct($codigo, $email)
    {
        $this->codigo = $codigo;
        $this->email = $email;
        
        
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Codigo Verificação',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       
        $this->to($this->email, 'Codigo Verificação');
        return new Content(
            view: 'emails.email-dizimo', with: ['email' => $this->codigo],
        );
    }


    public function build()
    {
        return $this->content();

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
