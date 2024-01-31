<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'Resource.php';
	}

	public static function handleProvider(): array
	{
		return [
			[ new Request('example', 'GET'), true ]
		];
	}

	#[DataProvider('handleProvider')]
	public function testHandle(Request $request, bool $expected): void
	{
		$result = Resource::handle($request);
		$this->assertSame($expected, $result);
	}
}