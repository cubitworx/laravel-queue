<?php

namespace Cubitworx\Laravel\Queue\Events;

use Cubitworx\Laravel\Queue\Model\LogJob;

class JobFailedEvent {

	public $logJob;

	/**
	 * Create a new event instance.
	 *
	 * @param LogJob $logJob
	 * @return void
	 */
	public function __construct(LogJob $logJob) {
		$this->logJob = $logJob;
	}

}
