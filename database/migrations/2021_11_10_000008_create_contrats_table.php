<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('signature1')->nullable();
            $table->string('signature2')->nullable();
            $table->integer('entreprise_id');
            $table->integer('clients_entreprise_id');
            $table->integer('employes_entreprise_id');
            $table->integer('facture_id');
            $table->integer('project_id');
            $table->integer('fournisseur_id');

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
        Schema::dropIfExists('contrats');
    }
}
