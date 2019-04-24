<?php

namespace App\Listeners;

use Cubitworx\Laravel\Queue\Events\JobProcessedEvent;
use Illuminate\Support\Facades\Notification;

class JobProcessedListener {

	/**
	 * Handle the event.
	 *
	 * @param  JobProcessedEvent  $event
	 * @return void
	 */
	public function handle(JobProcessedEvent $event) {
		echo "SUCCESS: JobProcessed\n";
	}

}
