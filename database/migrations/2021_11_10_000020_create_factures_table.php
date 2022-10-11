<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clients_entreprise_id');
            $table->integer('paiements_modalite_id');
            $table->integer('factures_article_id');
            $table->text('cc_cci');
            $table->date('echeance')->nullable();
            $table->text('adresse_facturation');
            $table->bigInteger('numero_facture');
            $table->text('messsage')->nullable();
            $table->text('message_affiche')->nullable();
            $table->string('has_taxe')->default('no');
            $table->integer('fournisseur_id');
            $table->string('type');

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
        Schema::dropIfExists('factures');
    }
}
