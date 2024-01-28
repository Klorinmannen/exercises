<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class NormalizePhoneNumbersTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'PhoneNumber.php';
	}

	public static function normalizeProvider(): array
	{
		return [];
	}

	#[DataProvider('normalizeProvider')]
	public function testNormalize(string $number, array $expected): void
	{
		$result = PhoneNumber::normalize($number);
		$this->assertEquals($expected, $result);
	}
}