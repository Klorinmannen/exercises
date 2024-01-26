<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReverseVatTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'ReverseVat.php';
	}

	public static function reverseVatProvider(): array
	{
		return [
			'Swedish added value tax' => [
				'grossPrice' => 100, 
				'vatPercentage' => 25, 
				'expected' => [
					'netPrice' => 80, 
					'vat' => 20
				]
			],
			'Swedish restaurants and groceries tax' => [
				'grossPrice' => 1715, 
				'vatPercentage' => 12,
				'expected' => [
					'netPrice' => 1531.25, 
					'vat' => 183.75
				]
			],
			'Swedish newspaper tax' => [
				'grossPrice' => 179, 
				'vatPercentage' => 6,
				'expected' => [
					'netPrice' => 168.87, 
					'vat' => 10.13
				]
			],
			'New York sales tax' => [
				'grossPrice' => 8.99,
				'vatPercentage' => 4,
				'expected' => [
					'netPrice' => 8.64,
					'vat' => 0.35
				]
			],
			'Texas sales tax' => [
				'grossPrice' => 8.99,
				'vatPercentage' => 6.25,
				'expected' => [
					'netPrice' => 8.46,
					'vat' => 0.53
				]
			],
			'India GST egg tax' => [
				'grossPrice' => 171,
				'vatPercentage' => 0,
				'expected' => [
					'netPrice' => 171,
					'vat' => 0
				]
			],
			'India GST capital goods tax' => [
				'grossPrice' => 420,
				'vatPercentage' => 18,
				'expected' => [
					'netPrice' => 355.93,
					'vat' => 64.07
				]
			],
		];
	}

	#[DataProvider('ReverseVatProvider')]
	public function testReverseVat(int|float $grossPrice, int|float $vatPercentage, array $expected): void
	{
		$result = VAT::reverse($grossPrice, $vatPercentage);
		$this->assertEquals($expected, $result);
	}
}