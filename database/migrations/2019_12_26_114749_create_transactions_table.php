<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->unsigned();
            $table->bigInteger('buyer_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->timestamps();
            $table->softDeletes(); //deleted_at
            $table->foreign('buyer_id')->references('id')->on('users')->delete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
