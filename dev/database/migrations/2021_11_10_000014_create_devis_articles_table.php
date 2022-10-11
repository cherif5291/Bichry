<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('devis_id');
            $table->integer('taxe_id');
            $table->integer('article_id');
            $table->integer('qte')->default(1);
            $table->double('taux');
            $table->double('total');

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
        Schema::dropIfExists('devis_articles');
    }
}
