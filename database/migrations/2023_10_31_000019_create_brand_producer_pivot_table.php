<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandProducerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('brand_producer', function (Blueprint $table) {
            $table->unsignedBigInteger('producer_id');
            $table->foreign('producer_id', 'producer_id_fk_9154957')->references('id')->on('producers')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_id_fk_9154957')->references('id')->on('brands')->onDelete('cascade');
        });
    }
}
