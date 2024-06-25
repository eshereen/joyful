<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_3140864')->references('id')->on('users');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id', 'coupon_fk_3140877')->references('id')->on('coupons');
        });
    }
}
