<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entreprise_id');
            $table->integer('clients_entreprise_id')->nullable();
            $table->text('cc_cci')->nullable();
            $table->text('adresse_facturation');
            $table->date('expiration');
            $table->bigInteger('numero_devis');
            $table->text('message_devis')->nullable();
            $table->text('message_releve')->nullable();
            $table
                ->string('status')
                ->default('deivis')
                ->nullable();

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
        Schema::dropIfExists('devis');
    }
}
