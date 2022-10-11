<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PaieController;
use App\Http\Controllers\Api\TaxeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\BonusController;
use App\Http\Controllers\Api\DevisController;
use App\Http\Controllers\Api\ImpotController;
use App\Http\Controllers\Api\RegleController;
use App\Http\Controllers\Api\BanqueController;
use App\Http\Controllers\Api\CaisseController;
use App\Http\Controllers\Api\LangueController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\RevenuController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ContratController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RuptureController;
use App\Http\Controllers\Api\DepenseController;
use App\Http\Controllers\Api\FactureController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\PresenceController;
use App\Http\Controllers\Api\ReglementController;
use App\Http\Controllers\Api\AbonnementController;
use App\Http\Controllers\Api\EntrepriseController;
use App\Http\Controllers\Api\InvitationController;
use App\Http\Controllers\Api\ModulePackController;
use App\Http\Controllers\Api\RecurrenceController;
use App\Http\Controllers\Api\RecusVenteController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\FournisseurController;
use App\Http\Controllers\Api\InfosSystemController;
use App\Http\Controllers\Api\LangueUsersController;
use App\Http\Controllers\Api\ModelesRecuController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\BanqueReglesController;
use App\Http\Controllers\Api\ContratsTypeController;
use App\Http\Controllers\Api\DevisArticleController;
use App\Http\Controllers\Api\HabilitationController;
use App\Http\Controllers\Api\ModelesDevisController;
use App\Http\Controllers\Api\PiecesJointeController;
use App\Http\Controllers\Api\ContratsModelController;
use App\Http\Controllers\Api\DocumentsTypeController;
use App\Http\Controllers\Api\PaiementsModeController;
use App\Http\Controllers\Api\DepensesPanierController;
use App\Http\Controllers\Api\ModelesFactureController;
use App\Http\Controllers\Api\FonctionnaliteController;
use App\Http\Controllers\Api\UserEntreprisesController;
use App\Http\Controllers\Api\FacturesArticleController;
use App\Http\Controllers\Api\PaieRecurrencesController;
use App\Http\Controllers\Api\ProjectContratsController;
use App\Http\Controllers\Api\FactureContratsController;
use App\Http\Controllers\Api\BanqueReglementsController;
use App\Http\Controllers\Api\CaisseReglementsController;
use App\Http\Controllers\Api\ComptescomptableController;
use App\Http\Controllers\Api\DevisesMonetaireController;
use App\Http\Controllers\Api\RegleRecurrencesController;
use App\Http\Controllers\Api\AbonnementBonusesController;
use App\Http\Controllers\Api\BanqueRecusVentesController;
use App\Http\Controllers\Api\CaisseRecusVentesController;
use App\Http\Controllers\Api\ClientsEntrepriseController;
use App\Http\Controllers\Api\UserHabilitationsController;
use App\Http\Controllers\Api\EntrepriseCaissesController;
use App\Http\Controllers\Api\EntrepriseBanquesController;
use App\Http\Controllers\Api\ModuleModulePacksController;
use App\Http\Controllers\Api\PaiementsModaliteController;
use App\Http\Controllers\Api\TaxeDevisArticlesController;
use App\Http\Controllers\Api\FactureReglementsController;
use App\Http\Controllers\Api\ArticleRecusVentesController;
use App\Http\Controllers\Api\BanqueTransactionsController;
use App\Http\Controllers\Api\CaisseTransactionsController;
use App\Http\Controllers\Api\DevisDevisArticlesController;
use App\Http\Controllers\Api\DevisPiecesJointesController;
use App\Http\Controllers\Api\EntrepriseDepensesController;
use App\Http\Controllers\Api\EntrepriseContratsController;
use App\Http\Controllers\Api\EntrepriseProjectsController;
use App\Http\Controllers\Api\EntrepriseRupturesController;
use App\Http\Controllers\Api\EntrepriseAllDevisController;
use App\Http\Controllers\Api\EntrepriseArticlesController;
use App\Http\Controllers\Api\EntreprisePackagesController;
use App\Http\Controllers\Api\InvitationRupturesController;
use App\Http\Controllers\Api\PackageModulePacksController;
use App\Http\Controllers\Api\EmployesEntrepriseController;
use App\Http\Controllers\Api\FactureRecurrencesController;
use App\Http\Controllers\Api\EntrepriseDocumentsController;
use App\Http\Controllers\Api\FournisseurContratsController;
use App\Http\Controllers\Api\FournisseurFacturesController;
use App\Http\Controllers\Api\ModuleHabilitationsController;
use App\Http\Controllers\Api\RevenuPiecesJointesController;
use App\Http\Controllers\Api\ArticleDevisArticlesController;
use App\Http\Controllers\Api\TaxeFacturesArticlesController;
use App\Http\Controllers\Api\DepensePiecesJointesController;
use App\Http\Controllers\Api\FacturePiecesJointesController;
use App\Http\Controllers\Api\EntrepriseAbonnementsController;
use App\Http\Controllers\Api\ModuleFonctionnalitesController;
use App\Http\Controllers\Api\PaiementsModeDepensesController;
use App\Http\Controllers\Api\DocumentsTypeDocumentsController;
use App\Http\Controllers\Api\EntrepriseFournisseursController;
use App\Http\Controllers\Api\ModelesRecuEntreprisesController;
use App\Http\Controllers\Api\ReglementPiecesJointesController;
use App\Http\Controllers\Api\DepenseDepensesPaniersController;
use App\Http\Controllers\Api\ArticleFacturesArticlesController;
use App\Http\Controllers\Api\UserEmployesEntreprisesController;
use App\Http\Controllers\Api\FacturesArticleFacturesController;
use App\Http\Controllers\Api\EntrepriseContratsTypesController;
use App\Http\Controllers\Api\EntreprisePiecesJointesController;
use App\Http\Controllers\Api\ModelesDevisEntreprisesController;
use App\Http\Controllers\Api\PaiementsModeReglementsController;
use App\Http\Controllers\Api\EmployesEntreprisePaiesController;
use App\Http\Controllers\Api\RecusVentePiecesJointesController;
use App\Http\Controllers\Api\EntrepriseContratsModelsController;
use App\Http\Controllers\Api\PaiementsModeRecusVentesController;
use App\Http\Controllers\Api\ClientsEntrepriseContratsController;
use App\Http\Controllers\Api\ClientsEntrepriseProjectsController;
use App\Http\Controllers\Api\ClientsEntrepriseFacturesController;
use App\Http\Controllers\Api\ClientsEntrepriseAllDevisController;
use App\Http\Controllers\Api\ModelesFactureEntreprisesController;
use App\Http\Controllers\Api\PaiementsModaliteFacturesController;
use App\Http\Controllers\Api\ContratsTypeContratsModelsController;
use App\Http\Controllers\Api\EmployesEntrepriseContratsController;
use App\Http\Controllers\Api\ClientsEntrepriseReglementsController;
use App\Http\Controllers\Api\DevisesMonetaireEntreprisesController;
use App\Http\Controllers\Api\EntrepriseComptescomptablesController;
use App\Http\Controllers\Api\EmployesEntreprisePresencesController;
use App\Http\Controllers\Api\FonctionnaliteHabilitationsController;
use App\Http\Controllers\Api\ClientsEntrepriseRecusVentesController;
use App\Http\Controllers\Api\ComptescomptableFournisseursController;
use App\Http\Controllers\Api\DevisesMonetaireFournisseursController;
use App\Http\Controllers\Api\EntreprisePaiementsModalitesController;
use App\Http\Controllers\Api\EntrepriseClientsEntreprisesController;
use App\Http\Controllers\Api\EntrepriseEmployesEntreprisesController;
use App\Http\Controllers\Api\PaiementsModaliteFournisseursController;
use App\Http\Controllers\Api\ClientsEntreprisePiecesJointesController;
use App\Http\Controllers\Api\PaiementsModeClientsEntreprisesController;
use App\Http\Controllers\Api\ClientsEntrepriseDepensesPaniersController;
use App\Http\Controllers\Api\DevisesMonetaireClientsEntreprisesController;
use App\Http\Controllers\Api\PaiementsModaliteClientsEntreprisesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('abonnements', AbonnementController::class);

        // Abonnement Bonuses
        Route::get('/abonnements/{abonnement}/bonuses', [
            AbonnementBonusesController::class,
            'index',
        ])->name('abonnements.bonuses.index');
        Route::post('/abonnements/{abonnement}/bonuses', [
            AbonnementBonusesController::class,
            'store',
        ])->name('abonnements.bonuses.store');

        Route::apiResource('articles', ArticleController::class);

        // Article Factures Articles
        Route::get('/articles/{article}/factures-articles', [
            ArticleFacturesArticlesController::class,
            'index',
        ])->name('articles.factures-articles.index');
        Route::post('/articles/{article}/factures-articles', [
            ArticleFacturesArticlesController::class,
            'store',
        ])->name('articles.factures-articles.store');

        // Article Devis Articles
        Route::get('/articles/{article}/devis-articles', [
            ArticleDevisArticlesController::class,
            'index',
        ])->name('articles.devis-articles.index');
        Route::post('/articles/{article}/devis-articles', [
            ArticleDevisArticlesController::class,
            'store',
        ])->name('articles.devis-articles.store');

        // Article Recus Ventes
        Route::get('/articles/{article}/recus-ventes', [
            ArticleRecusVentesController::class,
            'index',
        ])->name('articles.recus-ventes.index');
        Route::post('/articles/{article}/recus-ventes', [
            ArticleRecusVentesController::class,
            'store',
        ])->name('articles.recus-ventes.store');

        Route::apiResource('bonuses', BonusController::class);

        Route::apiResource('banques', BanqueController::class);

        // Banque Reglements
        Route::get('/banques/{banque}/reglements', [
            BanqueReglementsController::class,
            'index',
        ])->name('banques.reglements.index');
        Route::post('/banques/{banque}/reglements', [
            BanqueReglementsController::class,
            'store',
        ])->name('banques.reglements.store');

        // Banque Transactions
        Route::get('/banques/{banque}/transactions', [
            BanqueTransactionsController::class,
            'index',
        ])->name('banques.transactions.index');
        Route::post('/banques/{banque}/transactions', [
            BanqueTransactionsController::class,
            'store',
        ])->name('banques.transactions.store');

        // Banque Regles
        Route::get('/banques/{banque}/regles', [
            BanqueReglesController::class,
            'index',
        ])->name('banques.regles.index');
        Route::post('/banques/{banque}/regles', [
            BanqueReglesController::class,
            'store',
        ])->name('banques.regles.store');

        // Banque Recus Ventes
        Route::get('/banques/{banque}/recus-ventes', [
            BanqueRecusVentesController::class,
            'index',
        ])->name('banques.recus-ventes.index');
        Route::post('/banques/{banque}/recus-ventes', [
            BanqueRecusVentesController::class,
            'store',
        ])->name('banques.recus-ventes.store');

        Route::apiResource('caisses', CaisseController::class);

        // Caisse Reglements
        Route::get('/caisses/{caisse}/reglements', [
            CaisseReglementsController::class,
            'index',
        ])->name('caisses.reglements.index');
        Route::post('/caisses/{caisse}/reglements', [
            CaisseReglementsController::class,
            'store',
        ])->name('caisses.reglements.store');

        // Caisse Transactions
        Route::get('/caisses/{caisse}/transactions', [
            CaisseTransactionsController::class,
            'index',
        ])->name('caisses.transactions.index');
        Route::post('/caisses/{caisse}/transactions', [
            CaisseTransactionsController::class,
            'store',
        ])->name('caisses.transactions.store');

        // Caisse Recus Ventes
        Route::get('/caisses/{caisse}/recus-ventes', [
            CaisseRecusVentesController::class,
            'index',
        ])->name('caisses.recus-ventes.index');
        Route::post('/caisses/{caisse}/recus-ventes', [
            CaisseRecusVentesController::class,
            'store',
        ])->name('caisses.recus-ventes.store');

        Route::apiResource(
            'clients-entreprises',
            ClientsEntrepriseController::class
        );

        // ClientsEntreprise Contrats
        Route::get('/clients-entreprises/{clientsEntreprise}/contrats', [
            ClientsEntrepriseContratsController::class,
            'index',
        ])->name('clients-entreprises.contrats.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/contrats', [
            ClientsEntrepriseContratsController::class,
            'store',
        ])->name('clients-entreprises.contrats.store');

        // ClientsEntreprise Projects
        Route::get('/clients-entreprises/{clientsEntreprise}/projects', [
            ClientsEntrepriseProjectsController::class,
            'index',
        ])->name('clients-entreprises.projects.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/projects', [
            ClientsEntrepriseProjectsController::class,
            'store',
        ])->name('clients-entreprises.projects.store');

        // ClientsEntreprise Depenses Paniers
        Route::get(
            '/clients-entreprises/{clientsEntreprise}/depenses-paniers',
            [ClientsEntrepriseDepensesPaniersController::class, 'index']
        )->name('clients-entreprises.depenses-paniers.index');
        Route::post(
            '/clients-entreprises/{clientsEntreprise}/depenses-paniers',
            [ClientsEntrepriseDepensesPaniersController::class, 'store']
        )->name('clients-entreprises.depenses-paniers.store');

        // ClientsEntreprise Factures
        Route::get('/clients-entreprises/{clientsEntreprise}/factures', [
            ClientsEntrepriseFacturesController::class,
            'index',
        ])->name('clients-entreprises.factures.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/factures', [
            ClientsEntrepriseFacturesController::class,
            'store',
        ])->name('clients-entreprises.factures.store');

        // ClientsEntreprise Reglements
        Route::get('/clients-entreprises/{clientsEntreprise}/reglements', [
            ClientsEntrepriseReglementsController::class,
            'index',
        ])->name('clients-entreprises.reglements.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/reglements', [
            ClientsEntrepriseReglementsController::class,
            'store',
        ])->name('clients-entreprises.reglements.store');

        // ClientsEntreprise All Devis
        Route::get('/clients-entreprises/{clientsEntreprise}/all-devis', [
            ClientsEntrepriseAllDevisController::class,
            'index',
        ])->name('clients-entreprises.all-devis.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/all-devis', [
            ClientsEntrepriseAllDevisController::class,
            'store',
        ])->name('clients-entreprises.all-devis.store');

        // ClientsEntreprise Recus Ventes
        Route::get('/clients-entreprises/{clientsEntreprise}/recus-ventes', [
            ClientsEntrepriseRecusVentesController::class,
            'index',
        ])->name('clients-entreprises.recus-ventes.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/recus-ventes', [
            ClientsEntrepriseRecusVentesController::class,
            'store',
        ])->name('clients-entreprises.recus-ventes.store');

        // ClientsEntreprise Pieces Jointes
        Route::get('/clients-entreprises/{clientsEntreprise}/pieces-jointes', [
            ClientsEntreprisePiecesJointesController::class,
            'index',
        ])->name('clients-entreprises.pieces-jointes.index');
        Route::post('/clients-entreprises/{clientsEntreprise}/pieces-jointes', [
            ClientsEntreprisePiecesJointesController::class,
            'store',
        ])->name('clients-entreprises.pieces-jointes.store');

        Route::apiResource(
            'comptescomptables',
            ComptescomptableController::class
        );

        // Comptescomptable Fournisseurs Depenses
        Route::get('/comptescomptables/{comptescomptable}/fournisseurs', [
            ComptescomptableFournisseursController::class,
            'index',
        ])->name('comptescomptables.fournisseurs.index');
        Route::post('/comptescomptables/{comptescomptable}/fournisseurs', [
            ComptescomptableFournisseursController::class,
            'store',
        ])->name('comptescomptables.fournisseurs.store');

        Route::apiResource('users', UserController::class);

        // User Clients
        Route::get('/users/{user}/entreprises', [
            UserEntreprisesController::class,
            'index',
        ])->name('users.entreprises.index');
        Route::post('/users/{user}/entreprises', [
            UserEntreprisesController::class,
            'store',
        ])->name('users.entreprises.store');

        // User Employes Entreprises
        Route::get('/users/{user}/employes-entreprises', [
            UserEmployesEntreprisesController::class,
            'index',
        ])->name('users.employes-entreprises.index');
        Route::post('/users/{user}/employes-entreprises', [
            UserEmployesEntreprisesController::class,
            'store',
        ])->name('users.employes-entreprises.store');

        // User Habilitations
        Route::get('/users/{user}/habilitations', [
            UserHabilitationsController::class,
            'index',
        ])->name('users.habilitations.index');
        Route::post('/users/{user}/habilitations', [
            UserHabilitationsController::class,
            'store',
        ])->name('users.habilitations.store');

        Route::apiResource('contrats', ContratController::class);

        Route::apiResource('contrats-models', ContratsModelController::class);

        Route::apiResource('contrats-types', ContratsTypeController::class);

        // ContratsType Contrats Models
        Route::get('/contrats-types/{contratsType}/contrats-models', [
            ContratsTypeContratsModelsController::class,
            'index',
        ])->name('contrats-types.contrats-models.index');
        Route::post('/contrats-types/{contratsType}/contrats-models', [
            ContratsTypeContratsModelsController::class,
            'store',
        ])->name('contrats-types.contrats-models.store');

        Route::apiResource('depenses-paniers', DepensesPanierController::class);

        Route::apiResource('devis-articles', DevisArticleController::class);

        Route::apiResource('all-devis', DevisController::class);

        // Devis Devis Articles
        Route::get('/all-devis/{devis}/devis-articles', [
            DevisDevisArticlesController::class,
            'index',
        ])->name('all-devis.devis-articles.index');
        Route::post('/all-devis/{devis}/devis-articles', [
            DevisDevisArticlesController::class,
            'store',
        ])->name('all-devis.devis-articles.store');

        // Devis Pieces Jointes
        Route::get('/all-devis/{devis}/pieces-jointes', [
            DevisPiecesJointesController::class,
            'index',
        ])->name('all-devis.pieces-jointes.index');
        Route::post('/all-devis/{devis}/pieces-jointes', [
            DevisPiecesJointesController::class,
            'store',
        ])->name('all-devis.pieces-jointes.store');

        Route::apiResource(
            'devises-monetaires',
            DevisesMonetaireController::class
        );

        // DevisesMonetaire Clients Entreprises
        Route::get(
            '/devises-monetaires/{devisesMonetaire}/clients-entreprises',
            [DevisesMonetaireClientsEntreprisesController::class, 'index']
        )->name('devises-monetaires.clients-entreprises.index');
        Route::post(
            '/devises-monetaires/{devisesMonetaire}/clients-entreprises',
            [DevisesMonetaireClientsEntreprisesController::class, 'store']
        )->name('devises-monetaires.clients-entreprises.store');

        // DevisesMonetaire Entreprises
        Route::get('/devises-monetaires/{devisesMonetaire}/entreprises', [
            DevisesMonetaireEntreprisesController::class,
            'index',
        ])->name('devises-monetaires.entreprises.index');
        Route::post('/devises-monetaires/{devisesMonetaire}/entreprises', [
            DevisesMonetaireEntreprisesController::class,
            'store',
        ])->name('devises-monetaires.entreprises.store');

        // DevisesMonetaire Fournisseurs Depenses
        Route::get('/devises-monetaires/{devisesMonetaire}/fournisseurs', [
            DevisesMonetaireFournisseursController::class,
            'index',
        ])->name('devises-monetaires.fournisseurs.index');
        Route::post('/devises-monetaires/{devisesMonetaire}/fournisseurs', [
            DevisesMonetaireFournisseursController::class,
            'store',
        ])->name('devises-monetaires.fournisseurs.store');

        Route::apiResource('documents', DocumentController::class);

        Route::apiResource(
            'factures-articles',
            FacturesArticleController::class
        );

        // FacturesArticle Factures
        Route::get('/factures-articles/{facturesArticle}/factures', [
            FacturesArticleFacturesController::class,
            'index',
        ])->name('factures-articles.factures.index');
        Route::post('/factures-articles/{facturesArticle}/factures', [
            FacturesArticleFacturesController::class,
            'store',
        ])->name('factures-articles.factures.store');

        Route::apiResource('documents-types', DocumentsTypeController::class);

        // DocumentsType Documents
        Route::get('/documents-types/{documentsType}/documents', [
            DocumentsTypeDocumentsController::class,
            'index',
        ])->name('documents-types.documents.index');
        Route::post('/documents-types/{documentsType}/documents', [
            DocumentsTypeDocumentsController::class,
            'store',
        ])->name('documents-types.documents.store');

        Route::apiResource('entreprises', EntrepriseController::class);

        // Entreprise Depenses
        Route::get('/entreprises/{entreprise}/depenses', [
            EntrepriseDepensesController::class,
            'index',
        ])->name('entreprises.depenses.index');
        Route::post('/entreprises/{entreprise}/depenses', [
            EntrepriseDepensesController::class,
            'store',
        ])->name('entreprises.depenses.store');

        // Entreprise Employes Entreprises
        Route::get('/entreprises/{entreprise}/employes-entreprises', [
            EntrepriseEmployesEntreprisesController::class,
            'index',
        ])->name('entreprises.employes-entreprises.index');
        Route::post('/entreprises/{entreprise}/employes-entreprises', [
            EntrepriseEmployesEntreprisesController::class,
            'store',
        ])->name('entreprises.employes-entreprises.store');

        // Entreprise Contrats
        Route::get('/entreprises/{entreprise}/contrats', [
            EntrepriseContratsController::class,
            'index',
        ])->name('entreprises.contrats.index');
        Route::post('/entreprises/{entreprise}/contrats', [
            EntrepriseContratsController::class,
            'store',
        ])->name('entreprises.contrats.store');

        // Entreprise Contrats Models
        Route::get('/entreprises/{entreprise}/contrats-models', [
            EntrepriseContratsModelsController::class,
            'index',
        ])->name('entreprises.contrats-models.index');
        Route::post('/entreprises/{entreprise}/contrats-models', [
            EntrepriseContratsModelsController::class,
            'store',
        ])->name('entreprises.contrats-models.store');

        // Entreprise Projects
        Route::get('/entreprises/{entreprise}/projects', [
            EntrepriseProjectsController::class,
            'index',
        ])->name('entreprises.projects.index');
        Route::post('/entreprises/{entreprise}/projects', [
            EntrepriseProjectsController::class,
            'store',
        ])->name('entreprises.projects.store');

        // Entreprise Caisses
        Route::get('/entreprises/{entreprise}/caisses', [
            EntrepriseCaissesController::class,
            'index',
        ])->name('entreprises.caisses.index');
        Route::post('/entreprises/{entreprise}/caisses', [
            EntrepriseCaissesController::class,
            'store',
        ])->name('entreprises.caisses.store');

        // Entreprise Paiements Modalites
        Route::get('/entreprises/{entreprise}/paiements-modalites', [
            EntreprisePaiementsModalitesController::class,
            'index',
        ])->name('entreprises.paiements-modalites.index');
        Route::post('/entreprises/{entreprise}/paiements-modalites', [
            EntreprisePaiementsModalitesController::class,
            'store',
        ])->name('entreprises.paiements-modalites.store');

        // Entreprise Ruptures
        Route::get('/entreprises/{entreprise}/ruptures', [
            EntrepriseRupturesController::class,
            'index',
        ])->name('entreprises.ruptures.index');
        Route::post('/entreprises/{entreprise}/ruptures', [
            EntrepriseRupturesController::class,
            'store',
        ])->name('entreprises.ruptures.store');

        // Entreprise Comptescomptables
        Route::get('/entreprises/{entreprise}/comptescomptables', [
            EntrepriseComptescomptablesController::class,
            'index',
        ])->name('entreprises.comptescomptables.index');
        Route::post('/entreprises/{entreprise}/comptescomptables', [
            EntrepriseComptescomptablesController::class,
            'store',
        ])->name('entreprises.comptescomptables.store');

        // Entreprise All Devis
        Route::get('/entreprises/{entreprise}/all-devis', [
            EntrepriseAllDevisController::class,
            'index',
        ])->name('entreprises.all-devis.index');
        Route::post('/entreprises/{entreprise}/all-devis', [
            EntrepriseAllDevisController::class,
            'store',
        ])->name('entreprises.all-devis.store');

        // Entreprise Articles
        Route::get('/entreprises/{entreprise}/articles', [
            EntrepriseArticlesController::class,
            'index',
        ])->name('entreprises.articles.index');
        Route::post('/entreprises/{entreprise}/articles', [
            EntrepriseArticlesController::class,
            'store',
        ])->name('entreprises.articles.store');

        // Entreprise Fournisseurs Depenses
        Route::get('/entreprises/{entreprise}/fournisseurs', [
            EntrepriseFournisseursController::class,
            'index',
        ])->name('entreprises.fournisseurs.index');
        Route::post('/entreprises/{entreprise}/fournisseurs', [
            EntrepriseFournisseursController::class,
            'store',
        ])->name('entreprises.fournisseurs.store');

        // Entreprise Documents
        Route::get('/entreprises/{entreprise}/documents', [
            EntrepriseDocumentsController::class,
            'index',
        ])->name('entreprises.documents.index');
        Route::post('/entreprises/{entreprise}/documents', [
            EntrepriseDocumentsController::class,
            'store',
        ])->name('entreprises.documents.store');

        // Entreprise Clients Entreprises
        Route::get('/entreprises/{entreprise}/clients-entreprises', [
            EntrepriseClientsEntreprisesController::class,
            'index',
        ])->name('entreprises.clients-entreprises.index');
        Route::post('/entreprises/{entreprise}/clients-entreprises', [
            EntrepriseClientsEntreprisesController::class,
            'store',
        ])->name('entreprises.clients-entreprises.store');

        // Entreprise Fournisseurs
        Route::get('/entreprises/{entreprise}/fournisseurs', [
            EntrepriseFournisseursController::class,
            'index',
        ])->name('entreprises.fournisseurs.index');
        Route::post('/entreprises/{entreprise}/fournisseurs', [
            EntrepriseFournisseursController::class,
            'store',
        ])->name('entreprises.fournisseurs.store');

        // Entreprise Banques
        Route::get('/entreprises/{entreprise}/banques', [
            EntrepriseBanquesController::class,
            'index',
        ])->name('entreprises.banques.index');
        Route::post('/entreprises/{entreprise}/banques', [
            EntrepriseBanquesController::class,
            'store',
        ])->name('entreprises.banques.store');

        // Entreprise Abonnements
        Route::get('/entreprises/{entreprise}/abonnements', [
            EntrepriseAbonnementsController::class,
            'index',
        ])->name('entreprises.abonnements.index');
        Route::post('/entreprises/{entreprise}/abonnements', [
            EntrepriseAbonnementsController::class,
            'store',
        ])->name('entreprises.abonnements.store');

        // Entreprise Contrats Types
        Route::get('/entreprises/{entreprise}/contrats-types', [
            EntrepriseContratsTypesController::class,
            'index',
        ])->name('entreprises.contrats-types.index');
        Route::post('/entreprises/{entreprise}/contrats-types', [
            EntrepriseContratsTypesController::class,
            'store',
        ])->name('entreprises.contrats-types.store');

        // Entreprise Packages
        Route::get('/entreprises/{entreprise}/packages', [
            EntreprisePackagesController::class,
            'index',
        ])->name('entreprises.packages.index');
        Route::post('/entreprises/{entreprise}/packages', [
            EntreprisePackagesController::class,
            'store',
        ])->name('entreprises.packages.store');

        // Entreprise Pieces Jointes
        Route::get('/entreprises/{entreprise}/pieces-jointes', [
            EntreprisePiecesJointesController::class,
            'index',
        ])->name('entreprises.pieces-jointes.index');
        Route::post('/entreprises/{entreprise}/pieces-jointes', [
            EntreprisePiecesJointesController::class,
            'store',
        ])->name('entreprises.pieces-jointes.store');

        Route::apiResource('habilitations', HabilitationController::class);

        Route::apiResource('fournisseurs', FournisseurController::class);

        // Fournisseur Contrats
        Route::get('/fournisseurs/{fournisseur}/contrats', [
            FournisseurContratsController::class,
            'index',
        ])->name('fournisseurs.contrats.index');
        Route::post('/fournisseurs/{fournisseur}/contrats', [
            FournisseurContratsController::class,
            'store',
        ])->name('fournisseurs.contrats.store');

        // Fournisseur Factures
        Route::get('/fournisseurs/{fournisseur}/factures', [
            FournisseurFacturesController::class,
            'index',
        ])->name('fournisseurs.factures.index');
        Route::post('/fournisseurs/{fournisseur}/factures', [
            FournisseurFacturesController::class,
            'store',
        ])->name('fournisseurs.factures.store');

        Route::apiResource('impots', ImpotController::class);

        Route::apiResource('infos-systems', InfosSystemController::class);

        Route::apiResource('invitations', InvitationController::class);

        // Invitation Ruptures
        Route::get('/invitations/{invitation}/ruptures', [
            InvitationRupturesController::class,
            'index',
        ])->name('invitations.ruptures.index');
        Route::post('/invitations/{invitation}/ruptures', [
            InvitationRupturesController::class,
            'store',
        ])->name('invitations.ruptures.store');

        Route::apiResource('modeles-factures', ModelesFactureController::class);

        // ModelesFacture Entreprises
        Route::get('/modeles-factures/{modelesFacture}/entreprises', [
            ModelesFactureEntreprisesController::class,
            'index',
        ])->name('modeles-factures.entreprises.index');
        Route::post('/modeles-factures/{modelesFacture}/entreprises', [
            ModelesFactureEntreprisesController::class,
            'store',
        ])->name('modeles-factures.entreprises.store');

        Route::apiResource('langues', LangueController::class);

        // Langue Users
        Route::get('/langues/{langue}/users', [
            LangueUsersController::class,
            'index',
        ])->name('langues.users.index');
        Route::post('/langues/{langue}/users', [
            LangueUsersController::class,
            'store',
        ])->name('langues.users.store');

        Route::apiResource('all-modeles-devis', ModelesDevisController::class);

        // ModelesDevis Entreprises
        Route::get('/all-modeles-devis/{modelesDevis}/entreprises', [
            ModelesDevisEntreprisesController::class,
            'index',
        ])->name('all-modeles-devis.entreprises.index');
        Route::post('/all-modeles-devis/{modelesDevis}/entreprises', [
            ModelesDevisEntreprisesController::class,
            'store',
        ])->name('all-modeles-devis.entreprises.store');

        Route::apiResource('modeles-recus', ModelesRecuController::class);

        // ModelesRecu Entreprises
        Route::get('/modeles-recus/{modelesRecu}/entreprises', [
            ModelesRecuEntreprisesController::class,
            'index',
        ])->name('modeles-recus.entreprises.index');
        Route::post('/modeles-recus/{modelesRecu}/entreprises', [
            ModelesRecuEntreprisesController::class,
            'store',
        ])->name('modeles-recus.entreprises.store');

        Route::apiResource('modules', ModuleController::class);

        // Module Module Packs
        Route::get('/modules/{module}/module-packs', [
            ModuleModulePacksController::class,
            'index',
        ])->name('modules.module-packs.index');
        Route::post('/modules/{module}/module-packs', [
            ModuleModulePacksController::class,
            'store',
        ])->name('modules.module-packs.store');

        // Module Fonctionnalites
        Route::get('/modules/{module}/fonctionnalites', [
            ModuleFonctionnalitesController::class,
            'index',
        ])->name('modules.fonctionnalites.index');
        Route::post('/modules/{module}/fonctionnalites', [
            ModuleFonctionnalitesController::class,
            'store',
        ])->name('modules.fonctionnalites.store');

        // Module Habilitations
        Route::get('/modules/{module}/habilitations', [
            ModuleHabilitationsController::class,
            'index',
        ])->name('modules.habilitations.index');
        Route::post('/modules/{module}/habilitations', [
            ModuleHabilitationsController::class,
            'store',
        ])->name('modules.habilitations.store');

        Route::apiResource('packages', PackageController::class);

        // Package Module Packs
        Route::get('/packages/{package}/module-packs', [
            PackageModulePacksController::class,
            'index',
        ])->name('packages.module-packs.index');
        Route::post('/packages/{package}/module-packs', [
            PackageModulePacksController::class,
            'store',
        ])->name('packages.module-packs.store');

        Route::apiResource('module-packs', ModulePackController::class);

        Route::apiResource('paies', PaieController::class);

        // Paie Recurrences
        Route::get('/paies/{paie}/recurrences', [
            PaieRecurrencesController::class,
            'index',
        ])->name('paies.recurrences.index');
        Route::post('/paies/{paie}/recurrences', [
            PaieRecurrencesController::class,
            'store',
        ])->name('paies.recurrences.store');

        Route::apiResource(
            'paiements-modalites',
            PaiementsModaliteController::class
        );

        // PaiementsModalite Factures
        Route::get('/paiements-modalites/{paiementsModalite}/factures', [
            PaiementsModaliteFacturesController::class,
            'index',
        ])->name('paiements-modalites.factures.index');
        Route::post('/paiements-modalites/{paiementsModalite}/factures', [
            PaiementsModaliteFacturesController::class,
            'store',
        ])->name('paiements-modalites.factures.store');

        // PaiementsModalite Fournisseurs Depenses
        Route::get('/paiements-modalites/{paiementsModalite}/fournisseurs', [
            PaiementsModaliteFournisseursController::class,
            'index',
        ])->name('paiements-modalites.fournisseurs.index');
        Route::post('/paiements-modalites/{paiementsModalite}/fournisseurs', [
            PaiementsModaliteFournisseursController::class,
            'store',
        ])->name('paiements-modalites.fournisseurs.store');

        // PaiementsModalite Clients Entreprises
        Route::get(
            '/paiements-modalites/{paiementsModalite}/clients-entreprises',
            [PaiementsModaliteClientsEntreprisesController::class, 'index']
        )->name('paiements-modalites.clients-entreprises.index');
        Route::post(
            '/paiements-modalites/{paiementsModalite}/clients-entreprises',
            [PaiementsModaliteClientsEntreprisesController::class, 'store']
        )->name('paiements-modalites.clients-entreprises.store');

        Route::apiResource('paiements-modes', PaiementsModeController::class);

        // PaiementsMode Reglements
        Route::get('/paiements-modes/{paiementsMode}/reglements', [
            PaiementsModeReglementsController::class,
            'index',
        ])->name('paiements-modes.reglements.index');
        Route::post('/paiements-modes/{paiementsMode}/reglements', [
            PaiementsModeReglementsController::class,
            'store',
        ])->name('paiements-modes.reglements.store');

        // PaiementsMode Depenses
        Route::get('/paiements-modes/{paiementsMode}/depenses', [
            PaiementsModeDepensesController::class,
            'index',
        ])->name('paiements-modes.depenses.index');
        Route::post('/paiements-modes/{paiementsMode}/depenses', [
            PaiementsModeDepensesController::class,
            'store',
        ])->name('paiements-modes.depenses.store');

        // PaiementsMode Clients Entreprises
        Route::get('/paiements-modes/{paiementsMode}/clients-entreprises', [
            PaiementsModeClientsEntreprisesController::class,
            'index',
        ])->name('paiements-modes.clients-entreprises.index');
        Route::post('/paiements-modes/{paiementsMode}/clients-entreprises', [
            PaiementsModeClientsEntreprisesController::class,
            'store',
        ])->name('paiements-modes.clients-entreprises.store');

        // PaiementsMode Recus Ventes
        Route::get('/paiements-modes/{paiementsMode}/recus-ventes', [
            PaiementsModeRecusVentesController::class,
            'index',
        ])->name('paiements-modes.recus-ventes.index');
        Route::post('/paiements-modes/{paiementsMode}/recus-ventes', [
            PaiementsModeRecusVentesController::class,
            'store',
        ])->name('paiements-modes.recus-ventes.store');

        Route::apiResource('pieces-jointes', PiecesJointeController::class);

        Route::apiResource('projects', ProjectController::class);

        // Project Contrats
        Route::get('/projects/{project}/contrats', [
            ProjectContratsController::class,
            'index',
        ])->name('projects.contrats.index');
        Route::post('/projects/{project}/contrats', [
            ProjectContratsController::class,
            'store',
        ])->name('projects.contrats.store');

        Route::apiResource('recurrences', RecurrenceController::class);

        Route::apiResource('regles', RegleController::class);

        // Regle Recurrences
        Route::get('/regles/{regle}/recurrences', [
            RegleRecurrencesController::class,
            'index',
        ])->name('regles.recurrences.index');
        Route::post('/regles/{regle}/recurrences', [
            RegleRecurrencesController::class,
            'store',
        ])->name('regles.recurrences.store');

        Route::apiResource('ruptures', RuptureController::class);

        Route::apiResource('taxes', TaxeController::class);

        // Taxe Factures Articles
        Route::get('/taxes/{taxe}/factures-articles', [
            TaxeFacturesArticlesController::class,
            'index',
        ])->name('taxes.factures-articles.index');
        Route::post('/taxes/{taxe}/factures-articles', [
            TaxeFacturesArticlesController::class,
            'store',
        ])->name('taxes.factures-articles.store');

        // Taxe Devis Articles
        Route::get('/taxes/{taxe}/devis-articles', [
            TaxeDevisArticlesController::class,
            'index',
        ])->name('taxes.devis-articles.index');
        Route::post('/taxes/{taxe}/devis-articles', [
            TaxeDevisArticlesController::class,
            'store',
        ])->name('taxes.devis-articles.store');

        Route::apiResource('revenus', RevenuController::class);

        // Revenu Pieces Jointes
        Route::get('/revenus/{revenu}/pieces-jointes', [
            RevenuPiecesJointesController::class,
            'index',
        ])->name('revenus.pieces-jointes.index');
        Route::post('/revenus/{revenu}/pieces-jointes', [
            RevenuPiecesJointesController::class,
            'store',
        ])->name('revenus.pieces-jointes.store');

        Route::apiResource(
            'employes-entreprises',
            EmployesEntrepriseController::class
        );

        // EmployesEntreprise Contrats
        Route::get('/employes-entreprises/{employesEntreprise}/contrats', [
            EmployesEntrepriseContratsController::class,
            'index',
        ])->name('employes-entreprises.contrats.index');
        Route::post('/employes-entreprises/{employesEntreprise}/contrats', [
            EmployesEntrepriseContratsController::class,
            'store',
        ])->name('employes-entreprises.contrats.store');

        // EmployesEntreprise Paies
        Route::get('/employes-entreprises/{employesEntreprise}/paies', [
            EmployesEntreprisePaiesController::class,
            'index',
        ])->name('employes-entreprises.paies.index');
        Route::post('/employes-entreprises/{employesEntreprise}/paies', [
            EmployesEntreprisePaiesController::class,
            'store',
        ])->name('employes-entreprises.paies.store');

        // EmployesEntreprise Presences
        Route::get('/employes-entreprises/{employesEntreprise}/presences', [
            EmployesEntreprisePresencesController::class,
            'index',
        ])->name('employes-entreprises.presences.index');
        Route::post('/employes-entreprises/{employesEntreprise}/presences', [
            EmployesEntreprisePresencesController::class,
            'store',
        ])->name('employes-entreprises.presences.store');

        Route::apiResource('fonctionnalites', FonctionnaliteController::class);

        // Fonctionnalite Habilitations
        Route::get('/fonctionnalites/{fonctionnalite}/habilitations', [
            FonctionnaliteHabilitationsController::class,
            'index',
        ])->name('fonctionnalites.habilitations.index');
        Route::post('/fonctionnalites/{fonctionnalite}/habilitations', [
            FonctionnaliteHabilitationsController::class,
            'store',
        ])->name('fonctionnalites.habilitations.store');

        Route::apiResource('presences', PresenceController::class);

        Route::apiResource('recus-ventes', RecusVenteController::class);

        // RecusVente Pieces Jointes
        Route::get('/recus-ventes/{recusVente}/pieces-jointes', [
            RecusVentePiecesJointesController::class,
            'index',
        ])->name('recus-ventes.pieces-jointes.index');
        Route::post('/recus-ventes/{recusVente}/pieces-jointes', [
            RecusVentePiecesJointesController::class,
            'store',
        ])->name('recus-ventes.pieces-jointes.store');

        Route::apiResource('reglements', ReglementController::class);

        // Reglement Pieces Jointes
        Route::get('/reglements/{reglement}/pieces-jointes', [
            ReglementPiecesJointesController::class,
            'index',
        ])->name('reglements.pieces-jointes.index');
        Route::post('/reglements/{reglement}/pieces-jointes', [
            ReglementPiecesJointesController::class,
            'store',
        ])->name('reglements.pieces-jointes.store');

        Route::apiResource('transactions', TransactionController::class);

        Route::apiResource('depenses', DepenseController::class);

        // Depense Depenses Paniers
        Route::get('/depenses/{depense}/depenses-paniers', [
            DepenseDepensesPaniersController::class,
            'index',
        ])->name('depenses.depenses-paniers.index');
        Route::post('/depenses/{depense}/depenses-paniers', [
            DepenseDepensesPaniersController::class,
            'store',
        ])->name('depenses.depenses-paniers.store');

        // Depense Pieces Jointes
        Route::get('/depenses/{depense}/pieces-jointes', [
            DepensePiecesJointesController::class,
            'index',
        ])->name('depenses.pieces-jointes.index');
        Route::post('/depenses/{depense}/pieces-jointes', [
            DepensePiecesJointesController::class,
            'store',
        ])->name('depenses.pieces-jointes.store');

        Route::apiResource('factures', FactureController::class);

        // Facture Reglements
        Route::get('/factures/{facture}/reglements', [
            FactureReglementsController::class,
            'index',
        ])->name('factures.reglements.index');
        Route::post('/factures/{facture}/reglements', [
            FactureReglementsController::class,
            'store',
        ])->name('factures.reglements.store');

        // Facture Contrats
        Route::get('/factures/{facture}/contrats', [
            FactureContratsController::class,
            'index',
        ])->name('factures.contrats.index');
        Route::post('/factures/{facture}/contrats', [
            FactureContratsController::class,
            'store',
        ])->name('factures.contrats.store');

        // Facture Recurrences
        Route::get('/factures/{facture}/recurrences', [
            FactureRecurrencesController::class,
            'index',
        ])->name('factures.recurrences.index');
        Route::post('/factures/{facture}/recurrences', [
            FactureRecurrencesController::class,
            'store',
        ])->name('factures.recurrences.store');

        // Facture Pieces Jointes
        Route::get('/factures/{facture}/pieces-jointes', [
            FacturePiecesJointesController::class,
            'index',
        ])->name('factures.pieces-jointes.index');
        Route::post('/factures/{facture}/pieces-jointes', [
            FacturePiecesJointesController::class,
            'store',
        ])->name('factures.pieces-jointes.store');
    });
