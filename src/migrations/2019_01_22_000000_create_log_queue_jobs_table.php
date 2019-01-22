<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogQueueJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('log_queue_jobs', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('connection');
			$table->longText('exception')->nullable();
			$table->string('queue')->nullable();
			$table->longText('payload');
			$table->string('resolve_name')->nullable();
			$table->string('status');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('log_queue_jobs');
	}

}
