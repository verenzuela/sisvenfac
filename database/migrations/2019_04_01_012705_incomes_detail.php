<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncomesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('income_id')->index('fk_income_id_idx');
            $table->unsignedInteger('article_id')->index('fk_article_id_idx');
            $table->integer('quantity')->nullable();
            $table->decimal('but_price', 11, 2)->nullable();
            $table->decimal('sale_price', 11, 2);
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
        Schema::dropIfExists('incomes_detail');
    }
}
