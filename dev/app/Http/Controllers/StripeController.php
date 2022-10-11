<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Caisse;
use App\Models\CategoriesArticle;
use App\Models\Contrat;
use App\Models\ContratsModel;
use App\Models\ContratsType;
use App\Models\Entreprise;
use App\Models\Habilitation;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\Taxe;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;
use Session;
use Illuminate\Support\Str;

class StripeController extends Controller
{


    public function payment(Request $request)
    {
        $this->validate($request, [
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'nullable',
            'telephone' => 'nullable',
            'nom_entreprise' => 'required',
            'email_entreprise' => 'required',
            'telephone_entreprise' => 'required',
            'pack' => 'required',

            'password' => 'required|confirmed|min:6',


        ]);

        $data = json_encode(['payload' => $request->all()]);

        $stripe_obj = new Stripe();
        $stripe = $stripe_obj->setApiKey(env('STRIPE_SECRET'));
        $priceId = $request->pack;
        //session(['data' => $data]);


        $package = Package::where('stripe_id', $request->pack)->first();

        if ($package->prix != 0) {
            $IdSessionData = DB::table('sessions')->insertGetId(
                [
                    'ip_address' => $request->ip(),
                    'stripe_id' => $priceId,
                    'data' => $data,
                    'last_activity' => \Carbon\Carbon::now()
                ]
            );
        }


        if($package->prix == 0){
            //dd($data);
            $Entreprise = new Entreprise();
            $Entreprise->nom_entreprise =  $request->input('nom_entreprise');
            $Entreprise->email = $request->input('email_entreprise') ;
            $Entreprise->telephone = $request->input('telephone_entreprise') ;
            $Entreprise->save();
            $Abonnement = new Abonnement();
            $Abonnement->entreprise_id =  $Entreprise->id;
            $package = Package::all();


            $User = new User();
            $User->prenom = $request->input('prenom');
            $User->nom = $request->input('nom');
            $User->email =  $request->input('email');
            $User->entreprise_id = $Entreprise->id;
            $User->habilitation_id = 1;

            $Entreprise->user_id = $User->id;
            $Entreprise->update();
            for ($i = 0; $i < $package->count(); $i++) {
                if ( $request->input('pack') == $package[$i]->stripe_id) {
                    $Abonnement->package_id =  $package[$i]->id;
                    $User->role = $package[$i]->type;
                }
            }


            $Abonnement->expiration =  "2022-02-30";
            $Abonnement->save();

            $packagePayment = new PackagePayment();
            $packagePayment->abonnement_id = $Abonnement->id;
            $packagePayment->montant = Package::where('stripe_id', $request->input('pack'))->first()->prix;
            $packagePayment->save();

            $User->langue_id = 1;
            $User->password = Hash::make($request->input('password'));
            $User->save();

              //injection
            //Modalité de paiement
            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Immediatement";
            $Modalite->duree  = 0;
            $Modalite->save();

            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Autre";
            $Modalite->duree  = 120;
            $Modalite->save();


            $Habilitation = new Habilitation();
            $Habilitation->entreprise_id = $Entreprise->id;
            $Habilitation->habilitation = "admin";
            $Habilitation->save();

            $Habilitation = new Habilitation();
            $Habilitation->entreprise_id = $Entreprise->id;
            $Habilitation->habilitation = "employe";
            $Habilitation->save();

            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Net 15";
            $Modalite->duree = 15;
            $Modalite->save();

            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Net 30";
            $Modalite->duree = 30;
            $Modalite->save();

            //Modalité de paiement
            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Cash";
            $ModePaiement->save();

            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Virement bancaire";
            $ModePaiement->save();

            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Chèque bancaire";
            $ModePaiement->save();

             //Caisse
             $Caisse = new Caisse();
             $Caisse->entreprise_id = $Entreprise->id;
             $Caisse->nom = "Caisse principale";
             $Caisse->solde = 0;
             $Caisse->type = "default";
             $Caisse->save();

             //Categorie de produits
             $Categorie = new CategoriesArticle();
             $Categorie->entreprise_id = $Entreprise->id;
             $Categorie->nom = "service categorie simple";
             $Categorie->type = "service";
             $Categorie->save();

             $Categorie = new CategoriesArticle();
             $Categorie->entreprise_id = $Entreprise->id;
             $Categorie->nom = "produit categorie simple";
             $Categorie->type = "produit";
             $Categorie->save();




             //Type de contrat
             $ContratsType = new ContratsType();
             $ContratsType->entreprise_id = $Entreprise->id;
             $ContratsType->nom = "Non classée";
             $ContratsType->description = "Ceci est le modèle de type contrat par défaut crée par à l'ouverture de votre compte.. pour les contrats non classés";
             $ContratsType->save();


             $Contratmodel = new ContratsModel();
             $Contratmodel->entreprise_id = $Entreprise->id;
             $Contratmodel->nom = "Modèle par défaut";
             $Contratmodel->contrats_type_id = $ContratsType->id;
             $ContratsType->contenu = "Ceci est le modèle contrat par défaut crée par à l'ouverture de votre compte.. pour les contrats non classés";
             $Contratmodel->save();

            //contrat
            $Contrat = new Contrat();
            $Contrat->entreprise_id = $Entreprise->id;
            $Contrat->nom = "Contrat par défaut";
            $Contrat->contrats_model_id = $Contratmodel->id;
            $Contrat->type = $ContratsType->nom;
            $Contrat->contenu = "Ceci est un expemplaire de contrat par défaut crée par à l'ouverture de votre compte.. pour les contrats non classés";

            $Contrat->save();

            //Type de Taxe
            $Taxe = new Taxe();
            $Taxe->entreprise_id = $Entreprise->id;
            $Taxe->nom = "Hors Champs";
            $Taxe->taux = 0;
            $Taxe->save();


            $objet = __('messages.activation'). " | BilanPro";
            $text1 = "Bienvenue sur BilanPro";
            $text2 = "Pour plus de sécurité, validez d’abord votre adresse email avant d’utiliser notre plateforme. Cliquez au lien suivant :";
            $LINK= route('activate',[$User->id, Str::slug($User->prenom.$User->nom)]);
            $Thank= "Merci";
            $Team= "L’équipe de BilanPro";
            $text3 = "Si vous avez des questions, vous pouvez simplement répondre à cet e-mail ou trouver nos coordonnées ci-dessous.
            Contactez-nous également sur :";
            $data = array($text1, $text2,  $LINK, $Thank, $Team, $text3);
            sendWelcomeMail($User->email, $data, $objet,);
            // return back()->with('success',__('messages.activation_email_sent'));
        //injection

            return redirect()->route('login')->with('success',"Votre inscription s\'est correctement déroulé. Un mail d'activation vous ai envoyé vous devez activer votre compte.");
        }
        //dd($package);
        $session = \Stripe\Checkout\Session::create([
            'success_url' => 'http://localhost:8000/success-payment/'.$IdSessionData,
            'cancel_url' => 'http://localhost:8000/canceled',
            'mode' => 'subscription',
            'line_items' => [[
                'price' => $priceId,
                'quantity' => 1,
            ]],
        ]);

        return view('front.payment', compact('priceId', 'session', 'data'));
    }

    public function success(Request $request)
    {
        $rep = DB::table('sessions')->where('id', $request->id)->first();
        $data =  json_decode($rep->data)->payload;
        //dd($data);
        $Entreprise = new Entreprise();
        $Entreprise->nom_entreprise = $data->nom_entreprise;
        $Entreprise->email = $data->email_entreprise;
        $Entreprise->telephone = $data->telephone_entreprise;
        $Entreprise->save();
        $Abonnement = new Abonnement();
        $Abonnement->entreprise_id =  $Entreprise->id;
        $package = Package::all();


        $User = new User();
        $User->prenom = $data->prenom;
        $User->nom = $data->nom;
        $User->email = $data->email;
        $User->entreprise_id = $Entreprise->id;
        $User->habilitation_id = 1;

        for ($i = 0; $i < $package->count(); $i++) {
            if ($data->pack == $package[$i]->stripe_id) {
                $Abonnement->package_id =  $package[$i]->id;
                $User->role = $package[$i]->type;
            }
        }


        $Abonnement->expiration =  "2022-02-30";
        $Abonnement->save();

        $packagePayment = new PackagePayment();
        $packagePayment->abonnement_id = $Abonnement->id;
        $packagePayment->montant = Package::where('stripe_id', $data->pack)->first()->prix;
        $packagePayment->save();

        $User->langue_id = 1;
        $User->password = Hash::make($data->password);
        $User->save();

        //injection
            //Modalité de paiement
            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Immediatement";
            $Modalite->duree  = 0;
            $Modalite->save();

            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Net 15";
            $Modalite->duree = 15;
            $Modalite->save();

            $Modalite = new PaiementsModalite();
            $Modalite->entreprise_id = $Entreprise->id;
            $Modalite->nom = "Net 30";
            $Modalite->duree = 30;
            $Modalite->save();

            //Modalité de paiement
            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Cash";
            $ModePaiement->save();

            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Virement bancaire";
            $ModePaiement->save();

            $ModePaiement = new PaiementsMode();
            $ModePaiement->entreprise_id = $Entreprise->id;
            $ModePaiement->nom = "Chèque bancaire";
            $ModePaiement->save();

             //Caisse
             $Caisse = new Caisse();
             $Caisse->entreprise_id = $Entreprise->id;
             $Caisse->nom = "Caisse principale";
             $Caisse->solde = 0;
             $Caisse->type = "default";
             $Caisse->save();

             //Categorie de produits
             $Categorie = new CategoriesArticle();
             $Categorie->entreprise_id = $Entreprise->id;
             $Categorie->nom = "Non classée";
             $Categorie->type = "service";
             $Categorie->save();

             $Categorie = new CategoriesArticle();
             $Categorie->entreprise_id = $Entreprise->id;
             $Categorie->nom = "Non classée";
             $Categorie->type = "produit";
             $Categorie->save();




             //Type de contrat
             $ContratsType = new ContratsType();
             $ContratsType->entreprise_id = $Entreprise->id;
             $ContratsType->nom = "Non classée";
             $ContratsType->description = "Ceci est le modèle de type contrat par défaut crée par à l'ouverture de votre compte.. pour les contrats non classés";
             $ContratsType->save();


             $Contratmodel = new ContratsModel();
             $Contratmodel->entreprise_id = $Entreprise->id;
             $Contratmodel->nom = "Modèle par défaut";
             $Contratmodel->contrats_type_id = $ContratsType->id;
             $ContratsType->contenu = "Ceci est le modèle contrat par défaut crée par à l'ouverture de votre compte.. pour les contrats non classés";
             $Contratmodel->save();

            //contrat
            $Contrat = new Contrat();
            $Contrat->entreprise_id = $Entreprise->id;
            $Contrat->nom = "Modèle par défaut";
            $Contrat->contrats_model_id = $Contratmodel->id;
            $Contrat->save();

            //Type de Taxe
            $Taxe = new Taxe();
            $Taxe->entreprise_id = $Entreprise->id;
            $Taxe->nom = "Hors Champs";
            $Taxe->taux = 0;
            $Taxe->save();


            $objet = __('messages.activation'). "BilanPro";
            $text1 = "Bienvenue sur BilanPro,";
            $text2 = "Pour plus de sécurité, validez d’abord votre adresse email avant d’utiliser notre plateforme. Cliquez au lien suivant :";
            $LINK= asset('');
            $Thank= "Merci";
            $Team= "L’équipe de BilanPro";
            $text3 = "If you have any questions you can simply reply to this email or find our contact information below.
            Also contact us at";
            $data = array($text1, $text2,  $LINK, $Thank, $Team, $text3);
            sendWelcomeMail($User->email, $data, $objet,);
        //injection

        return redirect()->route('login')->with('success',"Votre inscription s'est correctement déroulé. Un mail d\'activation vous ai envoyé vous devez activer votre compte.");
    }

    public function cancel()
    {
        return redirect()->route('accueil')->with('Vous avez annulez le paiement');
    }
}
