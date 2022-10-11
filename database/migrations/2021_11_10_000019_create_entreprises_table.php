<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('nom_entreprise');
            $table->longText('a_propos');
            $table->string('email');
            $table->string('telephone');
            $table->string('portable');
            $table->text('adresse');
            $table->double('capital')->nullable();
            $table->string('logo')->nullable();
            $table->integer('modeles_devis_id');
            $table->integer('modeles_facture_id');
            $table->integer('modeles_recu_id');
            $table->integer('devises_monetaire_id');
            $table->string('couleur_primaire')->nullable();
            $table->string('couleur_secondaire')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
