<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupuserAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('signupuser_addons')) {
            Schema::create('signupuser_addons', function (Blueprint $table) {
                $table->id();
                $table->string('customer_id');
                $table->integer('addon_id');
                $table->integer('quantity');
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
        Schema::dropIfExists('signupuser_addons');
    }
}
