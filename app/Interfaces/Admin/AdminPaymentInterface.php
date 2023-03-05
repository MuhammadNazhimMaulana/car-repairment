<?php

namespace App\Interfaces\Admin;

interface AdminPaymentInterface
{
	public function index();
	public function store(int $id);
}