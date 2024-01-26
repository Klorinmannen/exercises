<?php

declare(strict_types=1);

class VAT
{
	public static function reverse(int|float $grossPrice, int|float $vatPercentage): array
	{
		$denominator = 1 + $vatPercentage * 0.01;
		$netPrice = $grossPrice / $denominator;
		$vat = $grossPrice - $netPrice;
		return [
			'netPrice' => static::round($netPrice),
			'vat' => static::round($vat)
		];
	}

	public static function round(int|float $number): float
	{
		return round($number, 2);
	}
}
