<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clients_entreprise_id');
            $table->integer('facture_id')->nullable();
            $table->integer('paiements_mode_id');
            $table->string('reference')->nullable();
            $table->string('cc_cci')->nullable();
            $table->string('approvisionnememnt');
            $table->integer('banque_id')->nullable();
            $table->integer('caisse_id')->nullable();
            $table->double('montant_recu');
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
        Schema::dropIfExists('reglements');
    }
}
