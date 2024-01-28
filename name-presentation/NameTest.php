<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{

	public static function setUpBeforeClass(): void
	{
		require_once 'Name.php';
	}

	public static function formatProvider(): array
	{
		return [
			'Empty' => [ '', '', '', '-' ],
			'Only space' => [ ' ', ' ', ' ', '-' ],
			'Fullname' => [ 'John', 'Doe', 'john@example.com', 'John D' ],
			'Only firstname' => [ 'Jane', '', 'jane@example.com', 'Jane' ],
			'Only lastname' => [ '', 'Hancock', 'hancock@example.com', 'Hancock' ],
			'Names with spaces' => [ ' John ', ' Doe ', 'john@example.com', 'John D' ],
			'Username' => [ '', '', ' john.doe86@example.com ', 'john.doe86' ],
			'Swedish fullname' => [ 'Örjan', 'Åkesson', '', 'Örjan Å' ],
			'Norwegian fullname' => [ 'Ole Gunnar', 'Solskjær', '', 'Ole Gunnar S' ],
			'German lastname' => [ '', 'Müller', '', 'Müller' ],
			'Spanish firstname' => [ 'Úrsula ', '', '', 'Úrsula' ]
		];
	}

	#[DataProvider('formatProvider')]
	public function testFormat(string $firstname, string $lastname, string $username ,string $expected): void
	{
		$result = Name::format($firstname, $lastname, $username);
		$this->assertEquals($expected, $result);
	}
}