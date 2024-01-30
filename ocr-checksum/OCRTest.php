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
			'Too short 4 digits' => [ '1058', false ],
			'Too long 16 digits' => [ '8463548189162960', false ],
			'Wrong checksum digit' => [ '84635481891649', false ],
			'Wrong length digit' => [ '84635481891658', false ],
			'Missing length digit' => [ '8463548189168', false ],
			'Missing checksum digit' => [ '8463548189164', false ],
			'Valid OCR 14 digits' => [ '84635481891648', true ],
			'valid OCR with # 14 digits' => [ '#84635481891648', true ],
			'Valid OCR with spaces 14 digits' => [ ' 8463 5481 8916 48 ', true ],
			'Valid OCR 5 digits' => [ '10553', true ],
			'Valid OCR 5 digits 2' => [ '00059', true ],
		];
	}

	#[DataProvider('verifyProvider')]
	public function testVerify(string $ocr, bool $expected): void
	{
		$result = OCR::verify($ocr);
		$this->assertEquals($expected, $result);
	}
}