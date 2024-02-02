<?php

declare(strict_types=1);

class OCR
{
	public static function verify(string $OCR): bool
	{			
		$OCR = str_replace([' ', '#'], '', $OCR);

		$hasOnlyDigits = preg_match('/^[0-9]+$/', $OCR) === 1;
		if (!$hasOnlyDigits) 
			return false;

		if (!static::verifyLength($OCR))
			return false;
		
		$OCRWithoutChecksum = substr($OCR, 0, -1);
		
		$checksum = static::luhnAlgorithm($OCRWithoutChecksum);
		$OCRChecksum = substr($OCR, -1);
		return $checksum == $OCRChecksum;
	}

	public static function verifyLength(string $OCR): bool
	{
		$OCRLength = strlen($OCR);
		if ($OCRLength < 5 || $OCRLength > 15)
			return false;
	
		$actualOCRLength = $OCRLength % 10;
		$length = substr($OCR, -2, 1);
		if ($actualOCRLength != $length) 
			return false;

		return true;
	}

	public static function luhnAlgorithm(string $OCRWithoutChecksum): int
	{
		$reverseOCR = strrev($OCRWithoutChecksum);
		$OCRDigits = str_split($reverseOCR);

		$sum = 0;
		foreach ($OCRDigits as $index => $digit) {
			if ($index % 2 == 0) {
				if ($digit > 4)
					$sum += $digit * 2 - 9;
				else
					$sum += $digit * 2;
			} else
				$sum += $digit;
		}
		
		$checksum = (10 - ($sum % 10)) % 10;
		
		return $checksum;
	}
}