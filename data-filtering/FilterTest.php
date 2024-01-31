<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'Filter.php';
	}

	public static function filterDataProvider(): array
	{
		return [];
	}

	#[DataProvider('filterDataProvider')]
	public function testFilterData(array $records, array $filters, array $expected): void
	{
		$result = Filter::filterData($records, $filters);
		$this->assertSame($expected, $result);
	}
}