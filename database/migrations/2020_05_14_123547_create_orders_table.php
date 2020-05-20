<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name');
            $table->integer('quantity')->default(1);
            $table->string('description')->nullable();
            $table->date('order_date')->default(now());
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_status_id');
            $table->unsignedBigInteger('order_type_id');
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
        Schema::dropIfExists('orders');
    }
}
