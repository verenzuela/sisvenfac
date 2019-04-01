<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeingKeyToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function(Blueprint $table){
            $table->foreign('person_id', 'fk_venta_cliente ')->references('id')->on('persons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_venta_user ')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function(Blueprint $table){
            $table->dropForeign('fk_venta_cliente');
            $table->dropForeign('fk_venta_user');
        });
    }
}
