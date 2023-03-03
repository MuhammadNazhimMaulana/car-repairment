<?php

namespace App\Interfaces\Admin;

interface PaymentInterface
{
	public function index();
	public function store(int $id);
}