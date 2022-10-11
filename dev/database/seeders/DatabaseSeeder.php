<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AbonnementSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(BanqueSeeder::class);
        $this->call(BonusSeeder::class);
        $this->call(CaisseSeeder::class);
        $this->call(ClientsEntrepriseSeeder::class);
        $this->call(ComptescomptableSeeder::class);
        $this->call(ContratSeeder::class);
        $this->call(ContratsModelSeeder::class);
        $this->call(ContratsTypeSeeder::class);
        $this->call(DepenseSeeder::class);
        $this->call(DepensesPanierSeeder::class);
        $this->call(DevisSeeder::class);
        $this->call(DevisArticleSeeder::class);
        $this->call(DevisesMonetaireSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(DocumentsTypeSeeder::class);
        $this->call(EmployesEntrepriseSeeder::class);
        $this->call(EntrepriseSeeder::class);
        $this->call(FactureSeeder::class);
        $this->call(FacturesArticleSeeder::class);
        $this->call(FonctionnaliteSeeder::class);
        $this->call(FournisseurSeeder::class);
        $this->call(HabilitationSeeder::class);
        $this->call(ImpotSeeder::class);
        $this->call(InfosSystemSeeder::class);
        $this->call(InvitationSeeder::class);
        $this->call(LangueSeeder::class);
        $this->call(ModelesDevisSeeder::class);
        $this->call(ModelesFactureSeeder::class);
        $this->call(ModelesRecuSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(ModulePackSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PaieSeeder::class);
        $this->call(PaiementsModaliteSeeder::class);
        $this->call(PaiementsModeSeeder::class);
        $this->call(PiecesJointeSeeder::class);
        $this->call(PresenceSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(RecurrenceSeeder::class);
        $this->call(RecusVenteSeeder::class);
        $this->call(RegleSeeder::class);
        $this->call(ReglementSeeder::class);
        $this->call(RevenuSeeder::class);
        $this->call(RuptureSeeder::class);
        $this->call(TaxeSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
