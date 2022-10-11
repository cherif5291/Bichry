<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\Bienvenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public static function sendWelcomeMail($firstname, $lastname, $email){

        $message ='Votre compte a été créer avec succès.';
        $data = ([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'message' => $message,
        ]);

        Mail::to($email)->send(new Bienvenue($data));
    }


}
