<?php

declare(strict_types=1);

class Request
{
	public string $resource;
	public string $method;
	public array $data;

	public function __construct(string $resource, string $method, array $data = [])
	{
		$this->resource = $resource;
		$this->method = $method;
		$this->data = $data;
	}
}

class Resource
{
	public static function handle(Request $request): bool
	{
		throw new \BadFunctionCallException('Implement the Reource::handle method.');
	}
}