<?php

namespace App\Interfaces\Webhook;

use Illuminate\Http\Request;

interface WebhookInterface
{
	public function index(Request $request);
}