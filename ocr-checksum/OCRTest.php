<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class OCRTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'OCR.php';
	}

	public static function verifyProvider(): array
	{
		return [
			'Empty OCR' => [ '', false ],
			'Invalid characters' => [ '12E4-5678.9012?3+4a', false ],
			'Bad OCR' => [ '83635481891640', false ],
			'Wrong checksum digit' => [ '82635481891644', false ],
			'Wrong length digit' => [ '81635481891655', false ],
			'Missing length digit' => [ '8263548189165', false ],
			'Missing checksum digit' => [ '8263548189164', false ],
			'Valid OCR' => [ '84635481891648', true ],
			'valid OCR with #' => [ '#84635481891648', true ],
			'Valid OCR with spaces' => [ ' 8463 5481 8916 48 ', true ],
		];
	}

	#[DataProvider('verifyProvider')]
	public function testVerify(string $ocr, bool $expected): void
	{
		$result = OCR::verify($ocr);
		$this->assertEquals($expected, $result);
	}
}