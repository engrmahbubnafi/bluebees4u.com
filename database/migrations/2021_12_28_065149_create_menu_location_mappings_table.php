<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLocationMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_location_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->length(11);
            $table->integer('location_id')->length(11);
            $table->integer('parent_id')->length(11)->nullable();
            $table->integer('sequence')->length(11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_location_mappings');
    }
}
