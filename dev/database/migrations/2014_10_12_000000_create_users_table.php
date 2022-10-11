<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->integer('entreprise_id')->nullable();
    //         $table->integer('client_entreprise_id')->nullable();

    //         $table->string('email')->unique();
    //         $table->string('role')->default("entreprise");
    //         $table->string('prenom');
    //         $table->string('nom');
    //         $table->string('adresse');
    //         $table->string('ville');
    //         $table->string('telephone');
    //         $table->string('portable')->nullable();
    //         $table->timestamp('email_verified_at')->nullable();
    //         $table->string('password');
    //         $table->string('remember_token', 100)->nullable();
    //         $table->integer('langue_id');

    //         $table->timestamps();
    //     });
    // }
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->integer('langue_id');

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
        Schema::dropIfExists('users');
    }
}
