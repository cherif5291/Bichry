<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entreprise_id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('entreprise');

            $table->string('email');
            $table->string('telephone');

            $table->string('titre')->nullable();
            $table->string('adresse');
            $table->string('ville');
            $table->string('province')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('pays');
            $table->text('note')->nullable();
            $table->integer('paiements_modalite_id')->nullable();
            $table->string('numero_compte')->nullable();
            $table->integer('comptescomptable_id')->nullable();
            $table->double('solde_ouverture')->nullable();
            $table->date('date_ouverture')->nullable();
            $table->integer('devises_monetaire_id');

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
        Schema::dropIfExists('fournisseurs');
    }
}
