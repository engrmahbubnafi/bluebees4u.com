<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->renameColumn('customerId', 'customer_id');
            $table->renameColumn('accountNumber', 'account_number');
            $table->renameColumn('transactionId', 'transaction_id');
            $table->renameColumn('promotionCode', 'promotion_code');
            $table->renameColumn('package', 'payment_package');
            $table->string('accountNumber')->nullable()->change();
            $table->string('transactionId')->nullable()->change();
            $table->string('status')->after('promotionCode');
            $table->string('package_price')->after('package');
            $table->string('addon_price')->after('package_price');
            $table->integer('additional_amount')->nullable()->after('addon_price');
            $table->string('additional_amount_note')->nullable()->after('additional_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
