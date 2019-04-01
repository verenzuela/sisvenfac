<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeingKeyToIncomesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes_detail', function(Blueprint $table){
            $table->foreign('income_id', 'fk_detalle_ingreso_ingreso ')->references('id')->on('incomes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('article_id', 'fk_detalle_ingreso_articulo ')->references('id')->on('articles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes_detail', function(Blueprint $table){
            $table->dropForeign('fk_detalle_ingreso_ingreso');
            $table->dropForeign('fk_detalle_ingreso_articulo');
        });
    }
}
