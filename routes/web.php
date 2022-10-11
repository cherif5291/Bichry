<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaieController;
use App\Http\Controllers\TaxeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ImpotController;
use App\Http\Controllers\RegleController;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GestionInventaireController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RuptureController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ReglementController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ModulePackController;
use App\Http\Controllers\RecurrenceController;
use App\Http\Controllers\RecusVenteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\InfosSystemController;
use App\Http\Controllers\ModelesRecuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ContratsTypeController;
use App\Http\Controllers\DevisArticleController;
use App\Http\Controllers\HabilitationController;
use App\Http\Controllers\ModelesDevisController;
use App\Http\Controllers\PiecesJointeController;
use App\Http\Controllers\ContratsModelController;
use App\Http\Controllers\DocumentsTypeController;
use App\Http\Controllers\PaiementsModeController;
use App\Http\Controllers\DepensesPanierController;
use App\Http\Controllers\ModelesFactureController;
use App\Http\Controllers\FonctionnaliteController;
use App\Http\Controllers\FacturesArticleController;
use App\Http\Controllers\ComptescomptableController;
use App\Http\Controllers\DevisesMonetaireController;
use App\Http\Controllers\ClientsEntrepriseController;
use App\Http\Controllers\ComptableController;
use App\Http\Controllers\PaiementsModaliteController;
use App\Http\Controllers\EmployesEntrepriseController;
use App\Http\Controllers\Mail\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

/* Mail Testing */

Route::get('/test-bienvenue', function () {
    return MailController::sendWelcomeMail('Baba', 'LY', 'baba.ly@illugraph-ic.com');
});

Route::get('/mail', function () {
    $data = [
        "firstname"=>"BABA",
        "lastname" => "LY",
        "email" => "baba.ly@illugraph-ic.com",
        "message" => "Votre compte a été créer avec succès !"
    ];

    return view('mailing.bienvenue', ["data" => $data]);
});

/* End testing mail*/


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Stripe payment

Route::stripeWebhooks('webhook-route-configured-at-the-stripe-dashboard');
Route::get('/plans', [App\Http\Controllers\Subscriptions\SubscriptionController::class, 'index'])->name('front.plans');
Route::post('/payment', [App\Http\Controllers\StripeController::class, 'payment'])->name('front.payment');
Route::get('/success-payment/{id}', [App\Http\Controllers\StripeController::class, 'success'])->name('front.payment-success');
Route::get('/canceled', [App\Http\Controllers\StripeController::class, 'cancel'])->name('front.payment-canceled');
Route::get('/activation/{id}', [App\Http\Controllers\Backoffice::class, 'activation'])->name('activation');
Route::get('/activate/{id}/account/{pass}', [App\Http\Controllers\Backoffice::class, 'activate'])->name('activate');
Route::get('/send/activation/{id}', [App\Http\Controllers\Backoffice::class, 'sendActivattion'])->name('sendActivattion');


Route::group(['middleware' => ['admin','auth']], function(){

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/clients/entreprises', [App\Http\Controllers\AdminController::class, 'entreprises'])->name('admin.clients.entreprises');
    Route::get('/admin/clients/cabinets', [App\Http\Controllers\AdminController::class, 'cabinets'])->name('admin.clients.cabinets');
    Route::get('/admin/clients/dossiers/{id}', [App\Http\Controllers\AdminController::class, 'entrepriseDossier'])->name('admin.clients.dossier');

    Route::post('/admin/dossier/client/{id}/update', [App\Http\Controllers\ClientsEntrepriseController::class, 'update'])->name('admin.client.update');
    Route::get('/admin/dossier/client/{id}/edit', [App\Http\Controllers\AdminController::class, 'entrepriseEdit'])->name('admin.client.edit');

    Route::get('/admin/clients/abonnements', [App\Http\Controllers\AdminController::class, 'abonnements'])->name('admin.clients.abonnements');
    Route::get('/admin/clients/abonnements/{id}/show', [App\Http\Controllers\AdminController::class, 'abonnementshow'])->name('admin.clients.abonnementshow');

    Route::get('/admin/parametres/', [AdminController::class, 'general'])->name('admin.parametres');
    Route::post('/admin/parametres/update', [App\Http\Controllers\InfosSystemController::class, 'update'])->name('admin.parametres.update');

    Route::get('/admin/parametres/packages', [PackageController::class, 'create'])->name('admin.parametres.packages');
    Route::get('/admin/parametres/packages/modifier/{id}', [PackageController::class, 'edit'])->name('admin.parametres.packages.edit');
    Route::get('/admin/parametres/packages/detail/{id}', [PackageController::class, 'show'])->name('admin.parametres.packages.show');

    Route::post('/admin/parametres/packages/ajouter', [PackageController::class, 'store'])->name('admin.parametres.packages.add');
    Route::post('/admin/parametres/packages/update/{id}', [PackageController::class, 'update'])->name('admin.parametres.packages.update');
    Route::post('/admin/parametres/packages/module/{id}', [PackageController::class, 'modules'])->name('admin.parametres.packages.modules.update');

    Route::get('/admin/parametres/utilisateurs', [UserController::class, 'newAdmin'])->name('admin.parametres.utilisateurs');
    Route::get('/admin/parametres/utilisateurs/{id}', [UserController::class, 'editAdmin'])->name('admin.parametres.utilisateurs.edit');
    Route::post('/admin/parametres/utilisateurs/store', [UserController::class, 'storeAdmin'])->name('admin.parametres.utilisateurs.store');

    Route::get('/admin/parametres/plan-comptable', [ComptescomptableController::class, 'defaults'])->name('admin.compte-comptable.default');
    Route::get('/admin/parametres/plan-comptable/{id}', [ComptescomptableController::class, 'defaultsEdit'])->name('admin.compte-comptable.default.edit');
    Route::post('/admin/parametres/plan-comptable/store', [ComptescomptableController::class, 'defaultsStore'])->name('admin.compte-comptable.default.store');
    Route::post('/admin/parametres/plan-comptable/{id}/update', [ComptescomptableController::class, 'defaultsUpdate'])->name('admin.compte-comptable.default.update');
    Route::get('/admin/parametres/plan-comptable/{id}/delete', [ComptescomptableController::class, 'destroy'])->name('admin.compte-comptable.default.delete');

    Route::get('/admin/parametres/website/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('admin.website');
    Route::post('/admin/parametres/website/update/', [App\Http\Controllers\WebsiteController::class, 'update'])->name('admin.website.update');

});
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('accueil');
Route::get('/demarrer', [App\Http\Controllers\FrontController::class, 'register'])->name('front.register');
Route::post('/demarrer', [App\Http\Controllers\UserController::class, 'getstarted'])->name('front.register.getstarted');


Route::group(['middleware' => ['entreprise','auth']], function(){
    Route::get('/entreprise', [App\Http\Controllers\Backoffice::class, 'index'])->name('entreprise');

    Route::get('/entreprise/mon-compte', [App\Http\Controllers\Backoffice::class, 'monCompte'])->name('entreprise.user.account');
    Route::get('/entreprise/mon-compte/emails', [App\Http\Controllers\Backoffice::class, 'mesEmails'])->name('entreprise.user.emails');

    Route::get('/entreprise/mon-compte/mot-de-passe', [App\Http\Controllers\Backoffice::class, 'motDePasse'])->name('entreprise.user.password');

    //CLients
    Route::get('/entreprise/mes-clients', [App\Http\Controllers\ClientsEntrepriseController::class, 'index'])->name('entreprise.clients');
    Route::get('/entreprise/ajouter-un-client', [App\Http\Controllers\ClientsEntrepriseController::class, 'ajouterClient'])->name('entreprise.client.add');
    Route::post('/entreprise/ajouter-un-client/new', [App\Http\Controllers\ClientsEntrepriseController::class, 'store'])->name('entreprise.client.store');

    Route::get('/entreprise/dossier/client/{id}', [App\Http\Controllers\ClientsEntrepriseController::class, 'dossierClient'])->name('entreprise.client.dossier');
    Route::get('/entreprise/dossier/client/{id}/edit', [App\Http\Controllers\ClientsEntrepriseController::class, 'edit'])->name('entreprise.client.edit');

    Route::post('/entreprise/dossier/client/{id}/update', [App\Http\Controllers\ClientsEntrepriseController::class, 'update'])->name('entreprise.client.update');

    Route::get('/entreprise/clients/types/', [App\Http\Controllers\ClientsEntrepriseController::class, 'typeClient'])->name('entreprise.client.type');

    // Banque
    Route::resource('banques', BanqueController::class);

    // Caisse
    Route::resource('taxes', TaxeController::class);

    // Taxe
    Route::resource('caisses', CaisseController::class);

    // Article
    Route::resource('articles', ArticleController::class);

     // Depenses
     //Route::resource('depenses', DepenseController::class);
     Route::get('/entreprise/creer/depense/new/draft/{id}', [App\Http\Controllers\DepenseController::class, 'newDraftDepense'])->name('entreprise.depense.new.draft');
     Route::post('/entreprise/creer/depense/addCategorytoDepense/', [App\Http\Controllers\DepenseController::class, 'addCategorytoDepense'])->name('entreprise.depense.addCategorytoDepense');
     Route::post('/entreprise/creer/depense/changeDepenseSatus/{id}', [App\Http\Controllers\DepenseController::class, 'changeDepenseSatus'])->name('entreprise.depense.changeDepenseSatus');
     Route::get('/get-data', [App\Http\Controllers\DepenseController::class, 'getData'])->name('get.data');
     Route::get('/entreprise/depense/delete/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('depenses.delete');

        //Facture
        Route::get('/entreprise/creer/depense/facture-a-payer/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseFacture'])->name('entreprise.depense.new.facture');
        Route::get('/entreprise/delete/depense/facture-a-payer/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('admin.depense.facture.delete');
        Route::post('/entreprise/creer/depense/facture-a-payer/', [App\Http\Controllers\DepenseController::class, 'newDepenseOnPop'])->name('entreprise.depense.new.DepenseOnPop');
        Route::post('/entreprise/creer/depense/facture-a-payer/update', [App\Http\Controllers\DepenseController::class, 'newDepenseOnPopUpdate'])->name('entreprise.depense.new.DepenseOnPopUpdate');

        //DepensesSimple
        Route::get('/entreprise/creer/depense/depenses-simple/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseSimple'])->name('entreprise.depense.new.depense');
        Route::get('/entreprise/delete/depense/depenses-simple/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('admin.depense.depenseSimple.delete');

        //Cheque
        Route::get('/entreprise/creer/depense/cheque/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseCheque'])->name('entreprise.depense.new.cheque');
        Route::get('/entreprise/delete/depense/cheque/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('admin.depense.cheque.delete');

        //Credit
        Route::get('/entreprise/creer/depense/creditFournisseurs/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseCreditFournisseur'])->name('entreprise.depense.new.creditFournisseurs');
        Route::get('/entreprise/delete/depense/creditFournisseurs/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('admin.depense.creditFournisseurs.delete');

    // Facture
    Route::get('/entreprise/creer/facture/new/draft/{id}', [App\Http\Controllers\FactureController::class, 'newDraftFacture'])->name('entreprise.facture.new.draft');
    Route::post('/entreprise/creer/facture/addArticletoDepense/', [App\Http\Controllers\FactureController::class, 'addArticletoFacture'])->name('entreprise.facture.addArticletoDepense');

       //Facture
    Route::post('/entreprise/creer/facture/changeFactureStatus', [App\Http\Controllers\FactureController::class, 'depenseFactureAdd'])->name('entreprise.facture.depenseFactureAdd');
       Route::get('/entreprise/get/facture/{id}', [App\Http\Controllers\FactureController::class, 'getFacture'])->name('entreprise.factures.get.facture');
       Route::post('/entreprise/factures/facture-update', [App\Http\Controllers\FactureController::class, 'depenseFactureUpdate'])->name('entreprise.factures.update.facture');
       Route::get('/entreprise/delete/factures/facture/{id}', [App\Http\Controllers\FactureController::class, 'destroy'])->name('admin.factures.factures.delete');
       Route::get('/entreprise/getinvoice/facture/{id}', [App\Http\Controllers\FactureController::class, 'facture'])->name('entreprise.factures.facture');

       Route::resource('factures', FactureController::class);
       //Route::get('/factures', [App\Http\Livewire\Entreprise\Commerciale\Factures\Index::class, 'render'])->name('factures.index');
       //Recu
       Route::get('/entreprise/creer/facture/recu/{id}', [App\Http\Controllers\FactureController::class, 'newFactureRecu'])->name('entreprise.commerciale.factures.recu.new');
       Route::get('/entreprise/delete/factures/recu/{id}', [App\Http\Controllers\FactureController::class, 'destroy'])->name('admin.factures.recu.delete');

    //Réglement facture et reçu
    Route::post('/entreprise/factures/facture-reglement', [App\Http\Controllers\ReglementController::class, 'reglementFacture'])->name('entreprise.factures.paiement.facture');
    Route::get('/entreprise/factures/generer/pdf/{id}', [App\Http\Controllers\FactureController::class, 'pdf'])->name('entreprise.factures.generer.pdf');
    Route::get('/entreprise/factures/send/pdf/{id}', [App\Http\Controllers\FactureController::class, 'sendFactureByMail'])->name('entreprise.facture.send');

    //    //Cheque
    //    Route::get('/entreprise/creer/depense/cheque/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseCheque'])->name('entreprise.depense.new.cheque');

    //    //Cheque
    //    Route::get('/entreprise/creer/depense/creditFournisseurs/{id}', [App\Http\Controllers\DepenseController::class, 'newDepenseCreditFournisseur'])->name('entreprise.depense.new.creditFournisseurs');


     //Fournisseurs

     Route::get('/entreprise/fournisseurs', [App\Http\Controllers\FournisseurController::class, 'index'])->name('entreprise.fournisseurs.list');
     Route::get('/entreprise/details-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'details'])->name('entreprise.fournisseur.details');
     Route::get('/entreprise/ajouter-un-fournisseur', [App\Http\Controllers\FournisseurController::class, 'addnew'])->name('entreprise.fournisseur.addnew');
     Route::post('/entreprise/fournisseur/store', [App\Http\Controllers\FournisseurController::class, 'store'])->name('entreprise.fournisseurs.new.store');
     Route::get('/entreprise/modifier-un-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'edit'])->name('entreprise.fournisseur.edit');
     Route::post('/entreprise/fournisseur/update/{id}', [App\Http\Controllers\FournisseurController::class, 'update'])->name('entreprise.fournisseurs.update');
     Route::delete('/entreprise/delete-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'delete'])->name('entreprise.fournisseur.delete');


     //Produits et services
     Route::get('/entreprise/commerciale/categories', [App\Http\Controllers\CategoriesArticleController::class, 'index'])->name('entreprise.commerciale.categories');
     Route::post('/entreprise/commerciale/categories/ajouter', [App\Http\Controllers\CategoriesArticleController::class, 'store'])->name('entreprise.commerciale.categorie.store');
     Route::get('/entreprise/commerciale/categories/modifier/{id}', [App\Http\Controllers\CategoriesArticleController::class, 'edit'])->name('entreprise.commerciale.categorie.edit');
     Route::post('/entreprise/commerciale/categories/update/{id}', [App\Http\Controllers\CategoriesArticleController::class, 'update'])->name('entreprise.commerciale.categorie.update');
     Route::get('/entreprise/commerciale/categories/delete/{id}', [App\Http\Controllers\CategoriesArticleController::class, 'destroy'])->name('entreprise.commerciale.categorie.destroy');
     Route::get('/entreprise/delete/panier/{id}', [App\Http\Controllers\DepensesPanierController::class, 'destroy'])->name('admin.factures.panier.delete');

     Route::get('/entreprise/commerciale/articles/produits', [App\Http\Controllers\ArticleController::class, 'produits'])->name('entreprise.commerciale.produits');
     Route::get('/entreprise/commerciale/articles/services', [App\Http\Controllers\ArticleController::class, 'services'])->name('entreprise.commerciale.services');

     Route::post('/entreprise/commerciale/articles/ajouter', [App\Http\Controllers\ArticleController::class, 'store'])->name('entreprise.commerciale.article.store');
     Route::get('/entreprise/commerciale/articles/modifier/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('entreprise.commerciale.article.edit');
     Route::post('/entreprise/commerciale/articles/update/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('entreprise.commerciale.article.update');
     Route::get('/entreprise/commerciale/articles/delete/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('entreprise.commerciale.article.destroy');

///Gestion d'inventaire

     Route::get('/entreprise/inventaire/stocks/index', [GestionInventaireController::class, 'stocks'])->name('entreprise.inventaire.stocks');
     Route::post('/entreprise/inventaire/produits/ajouter', [GestionInventaireController::class, 'store'])->name('entreprise.inventaire.article.store');
     Route::post('/entreprise/inventaire/articles/update/{id}', [GestionInventaireController::class, 'update'])->name('entreprise.inventaire.article.update');
     Route::get('/entreprise/inventaire/articles/modifier/{id}', [GestionInventaireController::class, 'edit'])->name('entreprise.inventaire.article.edit');
     Route::get('/entreprise/inventaire/articles/delete/{id}', [GestionInventaireController::class, 'destroy'])->name('entreprise.inventaire.article.destroy');



    //  Route::get('/entreprise/details-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'details'])->name('entreprise.fournisseur.details');
    //  Route::get('/entreprise/ajouter-un-fournisseur', [App\Http\Controllers\FournisseurController::class, 'addnew'])->name('entreprise.fournisseur.addnew');
    //  Route::post('/entreprise/fournisseur/store', [App\Http\Controllers\FournisseurController::class, 'store'])->name('entreprise.fournisseurs.new.store');
    //  Route::get('/entreprise/modifier-un-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'edit'])->name('entreprise.fournisseur.edit');
    //  Route::post('/entreprise/fournisseur/update/{id}', [App\Http\Controllers\FournisseurController::class, 'update'])->name('entreprise.fournisseurs.update');

     //Utilisateur
     Route::get('/entreprise/mon-compte', [App\Http\Controllers\UserController::class, 'index'])->name('entreprise.monCompte');
     Route::post('/entreprise/mon-compte/changer-mot-de-passe', [App\Http\Controllers\UserController::class, 'passwordChange'])->name('entreprise.monCompte.password.change');
     Route::post('/entreprise/mon-compte/changer-infos-compte', [App\Http\Controllers\UserController::class, 'infosChange'])->name('entreprise.monCompte.infos.change');

      //InfosEntreprise
      Route::get('/entreprise/Infos', [App\Http\Controllers\EntrepriseController::class, 'index'])->name('entreprise.infos');
      Route::post('/entreprise/infos/change/', [App\Http\Controllers\EntrepriseController::class, 'infosChange'])->name('entreprise.infos.change');

    //  Route::get('/entreprise/details-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'details'])->name('entreprise.fournisseur.details');
    //  Route::get('/entreprise/ajouter-un-fournisseur', [App\Http\Controllers\FournisseurController::class, 'addnew'])->name('entreprise.fournisseur.addnew');
    //  Route::post('/entreprise/fournisseur/store', [App\Http\Controllers\FournisseurController::class, 'store'])->name('entreprise.fournisseurs.new.store');
    //  Route::get('/entreprise/modifier-un-fournisseur/{id}', [App\Http\Controllers\FournisseurController::class, 'edit'])->name('entreprise.fournisseur.edit');
    //  Route::post('/entreprise/fournisseur/update/{id}', [App\Http\Controllers\FournisseurController::class, 'update'])->name('entreprise.fournisseurs.update');

    //compte comptable
    Route::get('/entreprise/compte-comptable/', [App\Http\Controllers\ComptescomptableController::class, 'index'])->name('entreprise.compte-comptable');
    Route::post('/entreprise/compte-comptable/edit/{id}/update', [App\Http\Controllers\ComptescomptableController::class, 'update'])->name('entreprise.compte-comptable.update');
    Route::post('/entreprise/compte-comptable/add', [App\Http\Controllers\ComptescomptableController::class, 'store'])->name('entreprise.compte-comptable.store');
    Route::get('/entreprise/compte-comptable/edit/{id}/', [App\Http\Controllers\ComptescomptableController::class, 'edit'])->name('entreprise.compte-comptable.edit');
    Route::get('/entreprise/compte-comptable/delete/{id}', [App\Http\Controllers\ComptescomptableController::class, 'destroy'])->name('entreprise.compte-comptable.delete');

    Route::get('/entreprise/compte-comptable/defaults/', [App\Http\Controllers\ComptescomptableController::class, 'viewDefaults'])->name('entreprise.compte-comptable.defaults');
    Route::get('/entreprise/compte-comptable/defaults/{id}/add/', [App\Http\Controllers\ComptescomptableController::class, 'addDefauls'])->name('entreprise.compte-comptable.defaults.add');


     //Contrats
     Route::get('/entreprise/contrats/liste', [App\Http\Controllers\ContratController::class, 'index'])->name('entreprise.contrats.liste');
     Route::get('/entreprise/contrats/modifier-contenu/{id}', [App\Http\Controllers\ContratController::class, 'editContent'])->name('entreprise.contrat.editContent');
     Route::get('/entreprise/contrats/detail/{id}', [App\Http\Controllers\ContratController::class, 'show'])->name('entreprise.contrat.show');
     Route::get('/entreprise/contrats/modifier/{id}', [App\Http\Controllers\ContratController::class, 'edit'])->name('entreprise.contrat.edit');



     Route::post('/entreprise/contrats/ajouter/', [App\Http\Controllers\ContratController::class, 'store'])->name('entreprise.contrat.store');
     Route::post('/entreprise/contrats/modifier/{id}', [App\Http\Controllers\ContratController::class, 'update'])->name('entreprise.contrat.update');
     Route::post('/entreprise/contrats/modifierContenu/{id}', [App\Http\Controllers\ContratController::class, 'updateContent'])->name('entreprise.contrat.updateContent');

     Route::get('/entreprise/models-contrats', [App\Http\Controllers\ContratsModelController::class, 'index'])->name('entreprise.models-contrat.liste');
     Route::get('/entreprise/models-contrats/ajouter/', [App\Http\Controllers\ContratsModelController::class, 'create'])->name('entreprise.models-contrat.add');
     Route::get('/entreprise/models-contrats/modifier/{id}', [App\Http\Controllers\ContratsModelController::class, 'edit'])->name('entreprise.models-contrat.edit');
     Route::post('/entreprise/models-contrats/ajouter/', [App\Http\Controllers\ContratsModelController::class, 'store'])->name('entreprise.models-contrat.store');
     Route::post('/entreprise/models-contrats/update/{id}', [App\Http\Controllers\ContratsModelController::class, 'update'])->name('entreprise.models-contrat.update');

     Route::get('/entreprise/type-contrats/ajouter/', [App\Http\Controllers\ContratsTypeController::class, 'index'])->name('entreprise.type-contrat.liste');
     Route::get('/entreprise/contrats/modifier/{id}', [App\Http\Controllers\ContratsTypeController::class, 'edit'])->name('entreprise.type-contrat.edit');
     Route::post('/entreprise/type-contrats/ajouter/', [App\Http\Controllers\ContratsTypeController::class, 'store'])->name('entreprise.type-contrat.store');
     Route::post('/entreprise/type-contrats/update/{id}', [App\Http\Controllers\ContratsTypeController::class, 'update'])->name('entreprise.type-contrat.update');

     //deletion
        Route::get('/entreprise/delete/contrat/{id}', [App\Http\Controllers\ContratController::class, 'destroy'])->name('entreprise.contrat.delete');
        Route::get('/entreprise/delete/type-contrat/{id}', [App\Http\Controllers\ContratsTypeController::class, 'destroy'])->name('entreprise.type-contrat.delete');
        Route::get('/entreprise/delete/contract/{id}', [App\Http\Controllers\ContratsModelController::class, 'destroy'])->name('entreprise.model-contrat.delete');

    //Caisses & Banques
    Route::get('/entreprise/finance/', [App\Http\Controllers\CaisseController::class, 'index'])->name('entreprise.finances');
    Route::get('/entreprise/finance/caisse/{id}', [App\Http\Controllers\CaisseController::class, 'caisse'])->name('entreprise.finances.caisse');
    Route::get('/entreprise/finance/banque/{id}', [App\Http\Controllers\CaisseController::class, 'banque'])->name('entreprise.finances.banque');

    Route::get('/entreprise/employes/', [App\Http\Controllers\EmployesEntrepriseController::class, 'index'])->name('entreprise.employes');
    Route::get('/entreprise/employes/ajouter', [App\Http\Controllers\EmployesEntrepriseController::class, 'create'])->name('entreprise.employe.create');
    Route::get('/entreprise/employes/edit/{id}', [App\Http\Controllers\EmployesEntrepriseController::class, 'edit'])->name('entreprise.employe.edit');

    Route::post('/entreprise/employes/add', [App\Http\Controllers\EmployesEntrepriseController::class, 'store'])->name('entreprise.employe.store');
    Route::post('/entreprise/employes/update/{id}', [App\Http\Controllers\EmployesEntrepriseController::class, 'update'])->name('entreprise.employe.update');

    //Invite accountant enterprise or person
    Route::get('/entreprise/mon-comptable/invitation', [App\Http\Controllers\InvitationController::class, 'create'])->name('entreprise.invitations.crearte');
    Route::get('/entreprise/mon-comptable', [App\Http\Controllers\ComptableController::class, 'index'])->name('entreprise.comptable');

    //Rapports
    Route::get('/entreprise/rapports/standard', [App\Http\Controllers\RapportController::class, 'index'])->name('entreprise.rapports');
    Route::get('/entreprise/rapports/performances', [App\Http\Controllers\RapportController::class, 'performances'])->name('entreprise.performances');

    //2FA
    Route::get('/Auth/Token/', [App\Http\Controllers\Token2faController::class, 'index'])->name('2fa');

    //Caisses & Banques
    Route::get('/entreprise/habilitations/', [App\Http\Controllers\HabilitationController::class, 'index'])->name('entreprise.habilitations');
    Route::get('/entreprise/habilitation/details/{id}', [App\Http\Controllers\FonctionnaliteController::class, 'edit'])->name('entreprise.habilitation.details');
    Route::post('/entreprise/habilitation/update/{id}', [App\Http\Controllers\HabilitationController::class, 'update'])->name('entreprise.habilitation.update');
    Route::post('/entreprise/habilitation/ajouter/', [App\Http\Controllers\HabilitationController::class, 'store'])->name('entreprise.habilitation.store');
    Route::get('/entreprise/habilitation/supprimer/{id}', [App\Http\Controllers\HabilitationController::class, 'destroy'])->name('entreprise.habilitation.delete');
    Route::post('/entreprise/habilitation/updatename/{id}', [App\Http\Controllers\HabilitationController::class, 'updateName'])->name('entreprise.habilitation.updateName');

    Route::get('/entreprise/abonnements/', [App\Http\Controllers\AbonnementController::class, 'index'])->name('entreprise.abonnements');

    Route::get('/entreprise/utilisateur/', [App\Http\Controllers\UserController::class, 'index'])->name('entreprise.utilisateurs');
    Route::post('/entreprise/utilisateur/ajouter/employes/', [App\Http\Controllers\UserController::class, 'createEntrepriseEmployeUser'])->name('entreprise.user.createEntrepriseEmployeUser');
    Route::post('/entreprise/utilisateur/ajouter/invitation', [App\Http\Controllers\UserController::class, 'createEntrepriseInvitationUser'])->name('entreprise.user.createEntrepriseInvitationUser');
    Route::get('/entreprise/utilisateur/modifier/{id}', [App\Http\Controllers\UserController::class, 'editUserEntreprise'])->name('entreprise.utilisateur.editUserEntreprise');
    Route::post('/entreprise/utilisateur/upate/{id}', [App\Http\Controllers\UserController::class, 'updateUserEntreprise'])->name('entreprise.utilisateur.updateUserEntreprise');
    Route::get('/entreprise/utilisateur/supprimer/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('entreprise.utilisateur.delete');


    Route::get('/entreprise/session/new/{id}', [App\Http\Controllers\ControlController::class, 'newSessionControl'])->name('entreprise.session.new');
    Route::get('/entreprise/session/redirect/', [App\Http\Controllers\ControlController::class, 'newSessionControlRedirect'])->name('entreprise.session.redirect');

    Route::get('/entreprise/session/end/', [App\Http\Controllers\ControlController::class, 'endSessionControl'])->name('entreprise.session.end');


    Route::get('/entreprise/taxe/ajouter/', [App\Http\Controllers\TaxeController::class, 'index'])->name('entreprise.taxe.liste');
    Route::get('/entreprise/taxe/modifier/{id}', [App\Http\Controllers\TaxeController::class, 'edit'])->name('entreprise.taxe.edit');
    Route::post('/entreprise/taxe/ajouter/', [App\Http\Controllers\TaxeController::class, 'store'])->name('entreprise.taxe.store');
    Route::post('/entreprise/taxe/update/{id}', [App\Http\Controllers\TaxeController::class, 'update'])->name('entreprise.taxe.update');
    Route::get('/entreprise/taxe/supprimer/{id}', [App\Http\Controllers\TaxeController::class, 'destroy'])->name('entreprise.taxe.delete');


    Route::get('/entreprise/mode-paiement/ajouter/', [App\Http\Controllers\PaiementsModeController::class, 'index'])->name('entreprise.mode-paiement.liste');
    Route::get('/entreprise/mode-paiement/modifier/{id}', [App\Http\Controllers\PaiementsModeController::class, 'edit'])->name('entreprise.mode-paiement.edit');
    Route::post('/entreprise/mode-paiement/ajouter/', [App\Http\Controllers\PaiementsModeController::class, 'store'])->name('entreprise.mode-paiement.store');
    Route::post('/entreprise/mode-paiement/update/{id}', [App\Http\Controllers\PaiementsModeController::class, 'update'])->name('entreprise.mode-paiement.update');
    Route::get('/entreprise/mode-paiement/supprimer/{id}', [App\Http\Controllers\PaiementsModeController::class, 'destroy'])->name('entreprise.mode-paiement.delete');

    Route::get('/entreprise/modalite-paiement/ajouter/', [App\Http\Controllers\PaiementsModaliteController::class, 'index'])->name('entreprise.modalite-paiement.liste');
    Route::get('/entreprise/modalite-paiement/modifier/{id}', [App\Http\Controllers\PaiementsModaliteController::class, 'edit'])->name('entreprise.modalite-paiement.edit');
    Route::post('/entreprise/modalite-paiement/store/', [App\Http\Controllers\PaiementsModaliteController::class, 'store'])->name('entreprise.modalite-paiement.store');
    Route::post('/entreprise/modalite-paiement/update/{id}', [App\Http\Controllers\PaiementsModaliteController::class, 'update'])->name('entreprise.modalite-paiement.update');
    Route::get('/entreprise/modalite-paiement/supprimer/{id}', [App\Http\Controllers\PaiementsModaliteController::class, 'destroy'])->name('entreprise.modalite-paiement.delete');


    Route::get('/entreprise/rapport/appercu', [App\Http\Controllers\Backoffice::class, 'overview'])->name('entreprise.rapport.overview');


    Route::post('/send/invitation/', [App\Http\Controllers\InvitationController::class, 'sendInvitation'])->name('sendInvitation');

});

Route::post('/Auth/Token/verification', [App\Http\Controllers\Token2faController::class, 'verify'])->name('verication.doublefactorauth');

// Route::get('/', [App\Http\Controllers\Token2faController::class, 'index'])->name('2fa');



// Route::prefix('/')
    // ->middleware('auth')
    // ->group(function () {
    //     Route::resource('roles', RoleController::class);
    //     Route::resource('permissions', PermissionController::class);

    //     Route::resource('abonnements', AbonnementController::class);
    //     Route::resource('bonuses', BonusController::class);
    //     Route::resource(
    //         'clients-entreprises',
    //         ClientsEntrepriseController::class
    //     );
    //     Route::resource('comptescomptables', ComptescomptableController::class);
    //     Route::resource('users', UserController::class);
    //     Route::resource('contrats', ContratController::class);
    //     Route::resource('contrats-models', ContratsModelController::class);
    //     Route::resource('contrats-types', ContratsTypeController::class);
    //     Route::resource('depenses-paniers', DepensesPanierController::class);
    //     Route::resource('devis-articles', DevisArticleController::class);
    //     Route::get('all-devis', [DevisController::class, 'index'])->name(
    //         'all-devis.index'
    //     );
    //     Route::post('all-devis', [DevisController::class, 'store'])->name(
    //         'all-devis.store'
    //     );
    //     Route::get('all-devis/create', [
    //         DevisController::class,
    //         'create',
    //     ])->name('all-devis.create');
    //     Route::get('all-devis/{devis}', [DevisController::class, 'show'])->name(
    //         'all-devis.show'
    //     );
    //     Route::get('all-devis/{devis}/edit', [
    //         DevisController::class,
    //         'edit',
    //     ])->name('all-devis.edit');
    //     Route::put('all-devis/{devis}', [
    //         DevisController::class,
    //         'update',
    //     ])->name('all-devis.update');
    //     Route::delete('all-devis/{devis}', [
    //         DevisController::class,
    //         'destroy',
    //     ])->name('all-devis.destroy');

    //     Route::resource(
    //         'devises-monetaires',
    //         DevisesMonetaireController::class
    //     );
    //     Route::resource('documents', DocumentController::class);
    //     Route::resource('factures-articles', FacturesArticleController::class);
    //     Route::resource('documents-types', DocumentsTypeController::class);
    //     Route::resource('entreprises', EntrepriseController::class);
    //     Route::resource('habilitations', HabilitationController::class);
    //     Route::resource('fournisseurs', FournisseurController::class);
    //     Route::resource('impots', ImpotController::class);
    //     Route::resource('infos-systems', InfosSystemController::class);
    //     Route::resource('invitations', InvitationController::class);
    //     Route::resource('modeles-factures', ModelesFactureController::class);
    //     Route::resource('langues', LangueController::class);
    //     Route::get('all-modeles-devis', [
    //         ModelesDevisController::class,
    //         'index',
    //     ])->name('all-modeles-devis.index');
    //     Route::post('all-modeles-devis', [
    //         ModelesDevisController::class,
    //         'store',
    //     ])->name('all-modeles-devis.store');
    //     Route::get('all-modeles-devis/create', [
    //         ModelesDevisController::class,
    //         'create',
    //     ])->name('all-modeles-devis.create');
    //     Route::get('all-modeles-devis/{modelesDevis}', [
    //         ModelesDevisController::class,
    //         'show',
    //     ])->name('all-modeles-devis.show');
    //     Route::get('all-modeles-devis/{modelesDevis}/edit', [
    //         ModelesDevisController::class,
    //         'edit',
    //     ])->name('all-modeles-devis.edit');
    //     Route::put('all-modeles-devis/{modelesDevis}', [
    //         ModelesDevisController::class,
    //         'update',
    //     ])->name('all-modeles-devis.update');
    //     Route::delete('all-modeles-devis/{modelesDevis}', [
    //         ModelesDevisController::class,
    //         'destroy',
    //     ])->name('all-modeles-devis.destroy');

    //     Route::resource('modeles-recus', ModelesRecuController::class);
    //     Route::resource('modules', ModuleController::class);
    //     Route::resource('packages', PackageController::class);
    //     Route::resource('module-packs', ModulePackController::class);
    //     Route::resource('paies', PaieController::class);
    //     Route::resource(
    //         'paiements-modalites',
    //         PaiementsModaliteController::class
    //     );
    //     Route::resource('paiements-modes', PaiementsModeController::class);
    //     Route::resource('pieces-jointes', PiecesJointeController::class);
    //     Route::resource('projects', ProjectController::class);
    //     Route::resource('recurrences', RecurrenceController::class);
    //     Route::resource('regles', RegleController::class);
    //     Route::resource('ruptures', RuptureController::class);
    //     Route::resource('revenus', RevenuController::class);
    //     Route::resource(
    //         'employes-entreprises',
    //         EmployesEntrepriseController::class
    //     );
    //     Route::resource('fonctionnalites', FonctionnaliteController::class);
    //     Route::resource('presences', PresenceController::class);
    //     Route::resource('recus-ventes', RecusVenteController::class);
    //     Route::resource('reglements', ReglementController::class);
    //     Route::resource('transactions', TransactionController::class);
    //     Route::resource('depenses', DepenseController::class);
    //     Route::resource('factures', FactureController::class);
    // });
