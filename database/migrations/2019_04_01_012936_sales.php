<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('person_id')->index('fk_person_id2_idx');
            $table->unsignedInteger('user_id')->index('fk_user_id_idx');
            $table->string('voucher_type', 20);
            $table->string('voucher_series', 7)->nullable();
            $table->string('voucher_number', 10)->nullable();  
            $table->dateTime('date_time');
            $table->decimal('tax', 4, 2)->nullable();
            $table->decimal('total_sale', 4, 2);
            $table->string('status', 20)->nullable();
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
        Schema::dropIfExists('sales');
    }
}
