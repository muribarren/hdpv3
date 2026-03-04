<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionHdp extends Mailable
{
    use Queueable, SerializesModels;
    public $hdp; // Esto hará que la variable $hdp esté disponible en la vista del correo
    /**
     * Create a new message instance.
     */
    public function __construct($hdp)
    {
        $this->hdp = $hdp; // Asigna el HDP a la propiedad pública para que esté disponible en la vista
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notificacion Hdp # ' . $this->hdp->numero,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notification-hdp',
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
