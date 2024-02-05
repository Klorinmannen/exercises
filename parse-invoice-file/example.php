<?php

declare(strict_types=1);

class example
{
	public static function parseFile(string $fullFilePathName): array
	{
		if (!file_exists($fullFilePathName))
			return [];

		$file = static::readFile($fullFilePathName);
		if (!$file)
			return [];

		[ $invoices, $errors ] = static::processFile($file);
		
		return static::formatOutput($invoices, $errors);
	}

	public static function readFile(string $fullFilePathName): array
	{
		$handle = fopen($fullFilePathName, 'r');
		if ($handle === false)
			return [];

		$fileLines = [];
		while ($fileLine = fgetcsv($handle, null, ","))
			$fileLines[] = $fileLine;

		fclose($handle);

		return $fileLines;
	}

	public static function processFile(array $file): array
	{
		$headers = array_shift($file);
		$headerCount = count($headers);

		$errors = [];
		$invoices = [];
		foreach ($file as $index => $line)
			if ($headerCount != count($line)) 
				$errors[$index + 2] = $line;
			else
				$invoices[] = array_combine($headers, $line);

		return [ $invoices, $errors ];
	}

	public static function formatOutput(array $invoices, array $errors): array
	{
		$total_file_sum = array_sum(array_column($invoices, 'inc_vat_amount'));

		$output = [
			'invoices' => $invoices,
			'invoice_count' => count($invoices),
			'total_file_sum' => $total_file_sum,
			'errors' => $errors
		];

		return $output;
	}
}
