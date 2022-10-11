<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesJointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces_jointes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('fichier');
            $table->integer('recus_vente_id');
            $table->integer('clients_entreprise_id');
            $table->integer('devis_id');
            $table->integer('facture_id');
            $table->integer('reglement_id');
            $table->integer('depense_id');
            $table->integer('revenu_id');
            $table->integer('entreprise_id');

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
        Schema::dropIfExists('pieces_jointes');
    }
}
