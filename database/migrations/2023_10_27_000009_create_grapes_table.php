<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrapesTable extends Migration
{
    public function up()
    {
        Schema::create('grapes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grapes')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
