<?php

declare(strict_types=1);

class OCR
{
	public static function verify(string $OCR): bool
	{			
		$OCR = str_replace([' ', '#'], '', $OCR);

		$OCRLength = strlen($OCR);
		if ($OCRLength < 5 || $OCRLength > 15)
			return false;
	
		$hasOnlyDigits = preg_match('/^[0-9]+$/', $OCR) === 1;
		if (!$hasOnlyDigits) 
			return false;
		
		$actualOCRLength = $OCRLength % 10;
		$length = substr($OCR, -2, 1);
		if ($actualOCRLength != $length) 
			return false;
		
		$strippedOCR = substr($OCR, 0, -1);
		$reverseOCR = strrev($strippedOCR);
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
	
		$OCRChecksum = substr($OCR, -1);
		$checksum = (10 - ($sum % 10)) % 10;
		return $checksum == $OCRChecksum;
	}
}