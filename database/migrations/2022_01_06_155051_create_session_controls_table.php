<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_controls', function (Blueprint $table) {
            $table->id();
            $table->integer('entreprise_id');
            $table->integer('control_id');
            $table->string('status')->default("valide");
            $table->date('started')->nullable();
            $table->date('ended')->nullable();
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
        Schema::dropIfExists('session_controls');
    }
}
