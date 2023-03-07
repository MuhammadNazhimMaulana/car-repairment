<?php

namespace App\Interfaces\User;

use Illuminate\Http\Request;

interface RepairmentInterface
{
	public function index();
	public function admin();
	public function show(int $id);
	public function store(Request $request);
	public function update(Request $request, int $id);
	public function pdf();
}