<?php

namespace App\Interfaces\User;

use Illuminate\Http\Request;

interface ProfileInterface
{
	public function index();

	public function update(Request $request);
}