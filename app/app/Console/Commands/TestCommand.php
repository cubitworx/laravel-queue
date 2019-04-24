<?php

namespace App\Console\Commands;

use App\Mail as AppMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class TestCommand extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'test';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Test lib functionality';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		Mail::queue(new AppMail\TestMail());
		Mail::queue(new AppMail\ErrorMail());

		$this->call('queue:work', [
			'--tries' => 1,
		]);
	}

}
