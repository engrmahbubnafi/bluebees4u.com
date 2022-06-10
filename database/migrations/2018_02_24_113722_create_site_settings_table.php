<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title', 55);
            $table->string('site_author', 55);
            $table->string('author_email')->unique();
            $table->string('address', 250)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('phone2')->nullable();
            $table->string('fax', 55)->nullable();
            $table->string('web', 55)->nullable();
            $table->json('social')->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('logo_inner', 100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('site_settings');
	}
}
