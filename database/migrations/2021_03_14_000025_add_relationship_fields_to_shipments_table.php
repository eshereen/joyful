<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShipmentsTable extends Migration
{
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id', 'area_fk_3140720')->references('id')->on('areas');
            $table->unsignedBigInteger('shipment_company_id');
            $table->foreign('shipment_company_id', 'shipment_company_fk_3140772')->references('id')->on('shipment_companies');
        });
    }
}
