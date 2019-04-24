<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		\Cubitworx\Laravel\Queue\Events\JobFailedEvent::class => [
			\App\Listeners\JobFailedListener::class,
		],
		\Cubitworx\Laravel\Queue\Events\JobProcessedEvent::class => [
			\App\Listeners\JobProcessedListener::class,
		],
		\Illuminate\Queue\Events\JobFailed::class => [
			\Cubitworx\Laravel\Queue\Listeners\JobFailedListener::class,
		],
		\Illuminate\Queue\Events\JobProcessed::class => [
			\Cubitworx\Laravel\Queue\Listeners\JobProcessedListener::class,
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		//
	}
}
