<?php

declare(strict_types=1);

class VAT
{
	public static function reverse(int|float $grossPrice, int|float $vatPercentage): array
	{
		throw new \BadFunctionCallException('Implement the VAT::reverse method');
	}

	public static function round(int|float $sum): float
	{
		throw new \Exception('Implement the VAT::round method');
	}
}