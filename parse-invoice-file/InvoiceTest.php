<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'Invoice.php';
	}

	public static function fileDataProvider(): array
	{
		return [
			static::buildTestCase('invoice_file')
		];
	}

	public static function buildTestCase(string $fileName): array
	{
		$fullFilePathName = static::fullFilePathName("$fileName.csv");
		$expected = static::expected_output("expected_$fileName.json");
		return [ $fullFilePathName, $expected ];
	}

	public static function expected_output(string $fileName): array
	{
		$fullFilePathName = static::fullFilePathName($fileName);
		$expectedResultFile = file_get_contents($fullFilePathName);
		return json_decode($expectedResultFile, true);
	}

	public static function fullFilePathName(string $fileName): string
	{
		return __DIR__ . DIRECTORY_SEPARATOR . $fileName;
	}

	#[DataProvider('fileDataProvider')]
	public function testFile(string $fullFileName, array $expected): void
	{
		$result = Invoice::parseFile($fullFileName);
		$this->assertEqualsCanonicalizing($expected, $result);
	}
}