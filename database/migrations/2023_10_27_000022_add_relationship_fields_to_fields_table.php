<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFieldsTable extends Migration
{
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->unsignedBigInteger('field_group_id')->nullable();
            $table->foreign('field_group_id', 'field_group_fk_9154939')->references('id')->on('fields_groups');
        });
    }
}
