<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecusVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recus_ventes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clients_entreprise_id');
            $table->text('cc_cci')->nullable();
            $table->text('adresse_livraison');
            $table->date('date_recu_vente');
            $table->bigInteger('reference');
            $table->bigInteger('numero_recu');
            $table->integer('article_id');
            $table->integer('paiements_mode_id');
            $table->text('message_recu');
            $table->text('message_releve');
            $table->string('depose_sur');
            $table->integer('caisse_id')->nullable();
            $table->integer('banque_id')->nullable();
            $table->double('montant');

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
        Schema::dropIfExists('recus_ventes');
    }
}
