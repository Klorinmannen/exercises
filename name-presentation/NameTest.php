<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{

	public static function setUpBeforeClass(): void
	{
		require_once 'example.php';
	}

	public static function formatProvider(): array
	{
		return [
			'Empty' => [ '', '', '', '-' ],
			'Only space' => [ ' ', ' ', ' ', '-' ],
			'Fullname' => [ 'John', 'doe', 'john@example.com', 'John D' ],
			'Only firstname' => [ 'jane', '', 'jane@example.com', 'Jane' ],
			'Only lastname' => [ '', 'Hancock', 'hancock@example.com', 'Hancock' ],
			'Names with spaces' => [ ' John ', ' Doe ', 'john@example.com', 'John D' ],
			'Username' => [ '', '', ' john.doe86@example.com ', 'john.doe86' ],
			'Swedish fullname' => [ 'Örjan', 'åkesson', '', 'Örjan Å' ],
			'Norwegian fullname' => [ 'Ole Gunnar', 'Solskjær', '', 'Ole Gunnar S' ],
			'German lastname' => [ '', 'Müller martin', '', 'Müller Martin' ],
			'Spanish firstname' => [ 'Úrsula ', '', '', 'Úrsula' ],
			'Strange' => [ '19', '86', '', '19 8']
		];
	}

	#[DataProvider('formatProvider')]
	public function testFormat(string $firstname, string $lastname, string $username ,string $expected): void
	{
		$result = Name::format($firstname, $lastname, $username);
		$this->assertEquals($expected, $result);
	}
}