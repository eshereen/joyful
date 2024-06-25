<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total_price', 15, 2);
            $table->string('email');
            $table->integer('item_count');
            $table->integer('shipping_cost');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shipping_name')->nullable();
            $table->longText('note')->nullable();
            $table->string('status');
            $table->string('paid');
            $table->string('shipped');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
