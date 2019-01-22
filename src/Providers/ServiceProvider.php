<?php

namespace Cubitworx\Laravel\Queue\Providers;

use Cubitworx\Laravel\Queue\Model\LogQueueJob;
use Exception;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->loadMigrationsFrom(__DIR__.'/../migrations');

		// On queue success
		Queue::after(function (JobProcessed $event) {
			try {

				(new LogQueueJob([
					'connection' => $event->connectionName,
					'payload' => $event->job->payload(),
					'queue' => $event->job->getQueue(),
					'resolve_name' => $event->job->resolveName(),
					'status' => 'success',
				]))->save();

			} catch(Exception $e) {
				Log::error($e);
			}
		});

		// On queue failing
		Queue::failing(function (JobFailed $event) {
			try {

				$logQueueJob = new LogQueueJob([
					'connection' => $event->connectionName,
					'exception' => $event->exception,
					'payload' => $event->job->payload(),
					'queue' => $event->job->getQueue(),
					'resolve_name' => $event->job->resolveName(),
					'status' => 'failed',
				]);
				$logQueueJob->save();

			} catch(Exception $e) {
				Log::error($e);
			}
		});
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

}
