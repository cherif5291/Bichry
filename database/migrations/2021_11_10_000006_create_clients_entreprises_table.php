<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_entreprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entreprise_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('entreprise');
            $table->string('email')->nullable();
            $table->text('telephone');


            $table->string('titre')->nullable();

            $table->longText('adresse');
            $table->string('ville');
            $table->string('province')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('pays');
            $table->text('note')->nullable();
            $table->integer('paiements_mode_id')->nullable();
            $table->integer('paiements_modalite_id')->nullable();
            $table->integer('devises_monetaire_id')->nullable();
            $table->string('logo')->nullable();

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
        Schema::dropIfExists('clients_entreprises');
    }
}
