<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Property;

class PropertyContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Crée une nouvelle instance de message.
     */
    public function __construct(public Property $property, public array $data)
    {
         // Le constructeur prend une instance de Property et un tableau de données comme arguments.
    }

   /**
     * Obtient l'enveloppe du message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            to: 'nabil@bachir.fr', // Destinataire principal de l'e-mail.
            replyTo: $this->data['email'],// Adresse de réponse.
            subject: 'Property Contact Mail',// Sujet de l'e-mail.
        );
        
    }

    /**
     * Obtient la définition du contenu du message.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.property.contact',
        );
    }

     /**
     * Obtient les pièces jointes pour le message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
