<?php

namespace Cubitworx\Laravel\Queue\Listeners;

use Cubitworx\Laravel\Queue\Events\JobProcessedEvent;
use Cubitworx\Laravel\Queue\Model\LogJob;
use Exception;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;

class JobProcessedListener {

	/**
	 * Handle the event.
	 *
	 * @param JobProcessed $event
	 * @return void
	 */
	public function handle(JobProcessed $event) {
		try {

			$logJob = new LogJob([
				'connection' => $event->connectionName,
				'payload' => $event->job->payload(),
				'queue' => $event->job->getQueue(),
				'resolve_name' => $event->job->resolveName(),
				'status' => 'success',
			]);
			$logJob->save();

			event(new JobProcessedEvent($logJob));

		} catch(Exception $e) {
			Log::error($e);
		}
	}

}
