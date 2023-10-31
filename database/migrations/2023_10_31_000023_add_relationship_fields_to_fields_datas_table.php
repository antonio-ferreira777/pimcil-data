<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFieldsDatasTable extends Migration
{
    public function up()
    {
        Schema::table('fields_datas', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_9154918')->references('id')->on('products');
            $table->unsignedBigInteger('field_id')->nullable();
            $table->foreign('field_id', 'field_fk_9154919')->references('id')->on('fields');
        });
    }
}
