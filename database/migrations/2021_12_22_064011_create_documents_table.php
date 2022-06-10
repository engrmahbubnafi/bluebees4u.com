<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 255);
            $table->string('file', 255);
            $table->integer('type_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('sequence')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->boolean('is_downloadable')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
