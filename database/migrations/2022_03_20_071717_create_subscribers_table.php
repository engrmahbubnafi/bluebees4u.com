<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->integer('signupuser_id');
            $table->string('customer_id')->default('0');
            $table->integer('package_id');
            $table->date('starting_date');
            $table->date('expiry_date');
            $table->date('trial_start_at');
            $table->date('trial_expire_at');
            $table->date('auto_renewal_at');
            $table->string('promotion_code')->nullable();
            $table->integer('number_of_month')->default(1);
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
        Schema::dropIfExists('subscribers');
    }
}
