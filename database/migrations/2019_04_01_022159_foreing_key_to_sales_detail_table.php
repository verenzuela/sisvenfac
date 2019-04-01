<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeingKeyToSalesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_detail', function(Blueprint $table){
            $table->foreign('article_id', 'fk_detalle_venta_articulo ')->references('id')->on('articles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('sale_id', 'fk_detalle_venta_venta ')->references('id')->on('sales')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_detail', function(Blueprint $table){
            $table->dropForeign('fk_detalle_venta_articulo');
            $table->dropForeign('fk_detalle_venta_venta');
        });
    }
}
