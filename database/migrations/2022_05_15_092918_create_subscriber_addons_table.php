<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriberAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subscriber_addons')){
            Schema::create('subscriber_addons', function (Blueprint $table) {
                $table->id();
                $table->string('customer_id');
                $table->integer('payment_id');
                $table->integer('addon_id');
                $table->integer('quantity');
                $table->integer('price');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriber_addons');
    }
}
