<?php

namespace Cubitworx\Laravel\Queue\Listeners;

use Cubitworx\Laravel\Queue\Events\JobFailedEvent;
use Cubitworx\Laravel\Queue\Model\LogJob;
use Exception;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Log;

class JobFailedListener {

	/**
	 * Handle the event.
	 *
	 * @param JobFailed $event
	 * @return void
	 */
	public function handle(JobFailed $event) {
		try {

			$logJob = new LogJob([
				'connection' => $event->connectionName,
				'exception' => $event->exception,
				'payload' => $event->job->payload(),
				'queue' => $event->job->getQueue(),
				'resolve_name' => $event->job->resolveName(),
				'status' => 'failed',
			]);
			$logJob->save();

			event(new JobFailedEvent($logJob));

		} catch(Exception $e) {
			Log::error($e);
		}
	}

}
