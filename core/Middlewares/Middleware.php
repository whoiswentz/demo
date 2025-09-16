<?php

namespace Core\Middlewares;

interface Middleware
{
	public function handle(): void;
}
