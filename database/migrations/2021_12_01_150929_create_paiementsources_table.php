<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiementsources', function (Blueprint $table) {
            $table->id();
            $table->integer('entreprise_id');
            $table->string('type');
            $table->string('nom');
            $table->float('solde')->default(0);
            $table->string('numero_compte')->nullable();
            $table->string('is_default')->nullable();
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
        Schema::dropIfExists('paiementsources');
    }
}
