<?php

namespace Cubitworx\Laravel\Queue\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->loadMigrationsFrom(__DIR__.'/../migrations');
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
