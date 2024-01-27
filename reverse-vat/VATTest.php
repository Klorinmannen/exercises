<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReverseVatTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'VAT.php';
	}

	public static function reverseVatProvider(): array
	{
		return [
			'No gross price' => [ 0, 19, 0 ],
			'Swedish income tax' => [ 37650, 31.81, 28563.84 ],
			'Swedish sales tax' => [ 100, 25, 80 ],
			'Swedish restaurants and groceries tax' => [ 175, 12, 156.25 ],
			'Swedish newspaper tax' => [ 179 , 6, 168.87 ],
			'New York sales tax' => [ 8.99, 4, 8.64 ],
			'Texas sales tax' => [ 8.99, 6.25, 8.46 ],
			'India GST egg tax' => [ 171, 0, 171 ],
			'India GST capital goods tax' => [ 420, 18, 355.93 ],
			'Japan sales tax' => [ 197, 5, 187.62 ],
			'UK standard rate' => [ 99.99, 20, 83.33 ],
			'Norway food tax' => [ 160, 15, 139.13 ],
		];
	}

	#[DataProvider('ReverseVatProvider')]
	public function testReverseVat(int|float $grossPrice, int|float $vatPercentage, int|float $expectedNetPrice): void
	{
		$netPrice = VAT::reverse($grossPrice, $vatPercentage);
		$netPrice = round($netPrice, 2);
		$this->assertEquals($expectedNetPrice, $netPrice);
	}
}