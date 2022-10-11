<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses_simples', function (Blueprint $table) {
            $table->id();
            $table->integer('clients_entreprise_id');
            $table->integer('fournisseur_id');
            $table->integer('paiements_mode_id')->nullable();
            $table->bigInteger('reference');
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
        Schema::dropIfExists('depenses_simples');
    }
}
