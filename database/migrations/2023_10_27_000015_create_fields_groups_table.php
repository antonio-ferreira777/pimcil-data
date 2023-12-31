<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('fields_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('group_order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
