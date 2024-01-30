<?php

declare(strict_types=1);

class Name
{
	const ENCODING = 'UTF-8';

	public static function format(string $firstname, string $lastname, string $username): string
	{
		$firstname = trim($firstname);
		$lastname = trim($lastname);
		$username = trim($username);

		if ($firstname && $lastname)
			return static::fullName($firstname, $lastname);
		if ($firstname)
			return static::ucName($firstname);
		if ($lastname)
			return static::ucName($lastname);
		if ($username)
			return static::usernameName($username);

		return '-';
	}

	public static function fullName(string $firstname, string $lastname): string
	{
		$firstname = static::ucName($firstname);
		$lastname = static::ucName($lastname);
		$lastLetter = mb_substr($lastname, 0, 1);
		return "$firstname $lastLetter";
	}

	public static function ucName(string $name)
	{
		$ucName = mb_convert_case($name, MB_CASE_TITLE, static::ENCODING);
		return $ucName;
	}

	public static function usernameName(string $username): string
	{
		$pos = mb_strpos($username, '@');
		$name = mb_substr($username, 0, $pos);
		return $name;
	}
}
