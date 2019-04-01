<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sale_id')->index('fk_sales_id_idx');
            $table->unsignedInteger('article_id')->index('fk_article_id2_idx');
            $table->integer('quantity')->nullable();
            $table->decimal('sale_price', 11, 2);
            $table->decimal('discount', 11, 2);
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
        Schema::dropIfExists('sales_detail');
    }
}
