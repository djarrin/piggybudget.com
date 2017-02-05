<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('weeklyBills');
            $table->boolean('monthsBills');
            $table->boolean('paycheckBills');
            $table->boolean('ccPayment');
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
        Schema::dropIfExists('email_type');
    }
}
