<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Incomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('person_id')->index('fk_person_id_idx');
            $table->string('voucher_type', 20);
            $table->string('voucher_series', 7)->nullable();
            $table->string('voucher_number', 10)->nullable();
            $table->dateTime('date_time');
            $table->decimal('tax', 4, 2)->nullable();
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
        Schema::dropIfExists('incomes');
    }
}
