<?php

declare(strict_types=1);

class Name
{
	public static function format(string $firstname, string $lastname, string $username): string
	{
		$firstname = trim($firstname);
		$lastname = trim($lastname);
		$username = trim($username);

		if ($firstname && $lastname) 
			return $firstname . ' ' . mb_substr($lastname, 0, 1);
		if ($firstname)
			return $firstname;
		if ($lastname)
			return $lastname;

		if ($username) {
			$pos = mb_strpos($username, '@');
			return mb_substr($username, 0, $pos);
		}

		return '-';
	}
}