<?php

namespace App\Listeners;

use Cubitworx\Laravel\Queue\Events\JobFailedEvent;
use Illuminate\Support\Facades\Notification;

class JobFailedListener {

	/**
	 * Handle the event.
	 *
	 * @param  JobFailedEvent  $event
	 * @return void
	 */
	public function handle(JobFailedEvent $event) {
		echo "SUCCESS: JobFailed\n";
	}

}
