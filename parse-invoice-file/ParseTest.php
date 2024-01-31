<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ParseTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'Parse.php';
	}

	public static function fileDataProvider(): array
	{
		return [];
	}

	#[DataProvider('fileDataProvider')]
	public function testFile(string $fullFileName, array $expected): void
	{
		$result = Parse::file($fullFileName);
		$this->assertSame($expected, $result);
	}
}