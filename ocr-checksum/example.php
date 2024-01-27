<?php

class OCR
{
	public static function verify(string $OCR): bool
	{			
		$OCR = str_replace([' ', '#'], '', $OCR);
		$hasOnlyDigits = preg_match('/^[0-9]+$/', $OCR) === 1;
		if (!$hasOnlyDigits) 
			return false;
		
		$actualLength = strlen($OCR) % 10;
		$length = substr($OCR, -2, 1);
		if ($actualLength != $length) 
			return false;

		$OCRChecksum = substr($OCR, -1);
		if ($OCRChecksum == 0)
			return false;
		
		$strippedOCR = substr($OCR, 0, -2);
		$reverseOCR = strrev($strippedOCR);
		$OCRDigitList = str_split($reverseOCR);

		$sum = 0;
		foreach ($OCRDigitList as $digitPos => $digit) {
			if ($digitPos % 2 == 0) {
				if ($digit > 4)
					$sum += ($digit * 2) % 10  + 1;
				else
					$sum += $digit * 2;
			} else
				$sum += $digit;
		}

		$checksum = (10 - ($sum % 10)) % 10;
		return $checksum == $OCRChecksum;
	}
}