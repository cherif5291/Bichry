<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes_entreprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entreprise_id');
            $table->integer('user_id')->nullable();
            $table->string('prenom');
            $table->string('nom');
            $table->string('initial');
            $table->string('email');
            $table->string('telephone');
            $table->date('data_embauche');
            $table->string('interval_paiement')->default('jour');
            $table->integer('duree_interval');
            $table->double('remuneration');

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
        Schema::dropIfExists('employes_entreprises');
    }
}
