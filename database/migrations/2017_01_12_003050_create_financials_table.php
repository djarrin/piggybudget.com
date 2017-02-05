<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('paycheck_amount', 15, 2);
            $table->string('paycheck_frequency');
            $table->date('last_paycheck');
            $table->string('paycheck_day');
            $table->decimal('current_savings', 15, 2);
            $table->decimal('current_debt', 15, 2);
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
        Schema::dropIfExists('financials');
    }
}
