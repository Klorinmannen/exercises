<?php

function reverseVat(int|float $grossPrice, int|float $vatPercentage): array
{
	$denominator = 1 + $vatPercentage * 0.01;
	$netPrice = $grossPrice / $denominator;
	$vat = $grossPrice - $netPrice;
	return [
		'netPrice' => $netPrice,
		'vat' => $vat
	];
}

$r = reverseVat(8.99, 4);
var_dump($r);
