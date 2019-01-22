<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable implements ShouldQueue {
	use Queueable, SerializesModels;

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		$this
			->from(['email'=>'test@test.com'])
			->to(['email'=>'test@test.com'])
			->subject('Test')
			->markdown('mail.test-markdown');

		return $this;
	}

}
