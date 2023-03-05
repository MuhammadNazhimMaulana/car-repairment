<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repairment_id');
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->unsignedBigInteger('midtrans_va_number')->nullable();
            $table->decimal('total', 32, 2)->nullable();
            $table->timestamps();

            $table->foreign('repairment_id')->references('id')->on('repairments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions',  function(Blueprint $table){
            // Drop Foreign Key
            $table->dropForeign(['repairment_id']);
        });
    }
}
