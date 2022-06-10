<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_link')->length(255);
            $table->integer('menu_id')->length(11);
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->length(11);
            $table->integer('updated_by')->length(11);
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
        Schema::dropIfExists('api_links');
    }
}
