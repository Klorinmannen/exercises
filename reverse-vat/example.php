<?php

declare(strict_types=1);

class VAT
{
	public static function reverse(int|float $grossPrice, int|float $vatPercentage): float
	{
		$denominator = 1 + $vatPercentage * 0.01;
		$netPrice = $grossPrice / $denominator;
		return $netPrice;
	}
}
