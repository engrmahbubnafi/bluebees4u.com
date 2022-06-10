<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(255);
            $table->string('slug')->length(255)->nullable();
            $table->string('file')->length(255)->nullable();
            $table->string('description')->length(255)->nullable();
            $table->enum('type',['Functional','Web','Both']);
            $table->boolean('has_content')->default(0);
            $table->string('api_link')->nullable();
            $table->integer('web_content_id')->length(11)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('is_deletable')->length(11)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
