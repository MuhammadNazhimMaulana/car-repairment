<?php

namespace App\Interfaces\User;

use Illuminate\Http\Request;

interface RepairmentInterface
{
	public function index();
	public function store(Request $request);
}