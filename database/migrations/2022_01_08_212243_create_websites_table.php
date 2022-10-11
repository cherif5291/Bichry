<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('debut')->nullable();
            $table->string('complement')->nullable();
            $table->string('description')->nullable();
            $table->string('btn1')->nullable();
            $table->string('link1')->nullable();
            $table->string('image1')->nullable();

            $table->string('packIntro')->nullable();
            $table->string('packText')->nullable();
            $table->string('serviceIntro')->nullable();
            $table->string('serviceText')->nullable();

            $table->string('image2')->nullable();
            $table->string('content2')->nullable();
            $table->string('btn2')->nullable();
            $table->string('link2')->nullable();

            $table->string('image3')->nullable();
            $table->string('content3')->nullable();
            $table->string('btn3')->nullable();
            $table->string('link3')->nullable();

            $table->string('image4')->nullable();
            $table->string('content4')->nullable();
            $table->string('btn4')->nullable();
            $table->string('link4')->nullable();

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
        Schema::dropIfExists('websites');
    }
}
