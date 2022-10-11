<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos_systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_plateforme');
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('telephone');
            $table->string('whatsapp')->nullable();
            $table->string('slogan')->nullable();


            $table->string('ville');
            $table->string('code_postale');
            $table->string('pays');
            $table->string('adresse');

            $table->string('logo_couleur')->nullable();
            $table->string('logo_blanc')->nullable();
            $table->string('fav_icon')->nullable();

            $table->string('email_contact');
            $table->string('email_support')->nullable();

            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('linkedIn');

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
        Schema::dropIfExists('infos_systems');
    }
}
