<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs_credits', function (Blueprint $table) {
            $table->id();
            $table->integer('depense_id');
            $table->integer('clients_entreprise_id')->nullable();
            $table->integer('fournisseur_id')->nullable();
            $table->text('adresse_postale');
            $table->date('date_paiement');
            $table->text('reference')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('fournisseurs_credits');
    }
}
