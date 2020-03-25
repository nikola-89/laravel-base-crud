<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series', function (Blueprint $table) {
			$table->id();
			$table->char('content_id')->unique();
			$table->string('distributor', 30);
			$table->string('title', 100)->charset('utf8');
			$table->text('synopsis')->charset('utf8')->nullable();
			$table->year('year');
			$table->tinyInteger('season');
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
		Schema::dropIfExists('series');
	}
}
