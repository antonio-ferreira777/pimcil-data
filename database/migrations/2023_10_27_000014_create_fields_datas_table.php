<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsDatasTable extends Migration
{
    public function up()
    {
        Schema::create('fields_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('field_order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
