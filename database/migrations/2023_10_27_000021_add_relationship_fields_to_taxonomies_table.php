<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaxonomiesTable extends Migration
{
    public function up()
    {
        Schema::table('taxonomies', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'parent_fk_9154896')->references('id')->on('taxonomies');
        });
    }
}
