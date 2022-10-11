<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($intitule, $description, $btn_lien_utile, $link_lien_utile, $attachement, $objet, $Facture)
    {
        $this->intitule = $intitule;
        $this->description = $description;
        $this->btn_lien_utile = $btn_lien_utile;
        $this->link_lien_utile = $link_lien_utile;
        $this->attachement = $attachement;
        $this->objet = $objet;
        $this->Facture = $Facture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))

        ->subject($this->objet." | BilanPro®")
        ->view('emails.notification')
        ->attach($this->attachement, [
            'as' => $this->attachement.".pdf",
            'mime' => 'application/pdf',
        ])
        ->with(['intitule' => $this->intitule, 'description' => $this->description, 'btn_lien_utile' => $this->btn_lien_utile, 'link_lien_utile' => $this->link_lien_utile, 'objet' => $this->objet,  'Facture' => $this->Facture]);
    }
}

