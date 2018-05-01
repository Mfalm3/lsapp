<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_abstract', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceno');
            $table->string('customerName');
            $table->date('saleDate');
            $table->float('invoiceTotals');
            $table->float('amountPaid');
            $table->float('balance');
            $table->string('comment');
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
        Schema::dropIfExists('sales_abstract');
    }
}
