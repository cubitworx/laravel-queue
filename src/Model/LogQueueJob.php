<?php

namespace Cubitworx\Laravel\Queue\Model;

use Illuminate\Database\Eloquent\Model;

class LogQueueJob extends Model {

	protected $casts = [
		'payload' => 'array'
	];

	protected $guarded = [
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	];

}
