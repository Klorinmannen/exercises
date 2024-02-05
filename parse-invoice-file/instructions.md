# Instructions

Implement a function to parse a csv invoice file given by its full path name.  

In this file we do not consider invoice lines at all. Imagine this is an invoice file for a membership fee for a soccer club or similiar. 

Each row is therefore considered to be an invoice on its own.

It is expected that each row, an invoice, maps correctly between title/header field and their corresponding value for the current row in the resulting set after processing.

If the number of title/header fields does not match the current row column number, log this as an error with corresponding file line number and the offending line.

If the file does not exist, return an empty set.

Requirements
- The output should contain an invoice count of all invoices.
- The output should contain a total sum of all invoices, the summarized total of all sums including vat.
- The output should contain a list of all invoices.
- The output should contain a list of all invoices with errors with the corresponding line number from the invoice file.
- Invoices with errors are to be excluded from the resulting invoices set.
- Should be able to handle a change in the field/column order without needing to rewrite the script.

Expected output:
```
[
	'invoices' => [ 
		[ 
		'invoice_number' => nnnnn,
		'first_name' => ...,
		...
	 	],
		[ ... ],
		[ ... ]
	],
	'invoice_count' => n,
	'total_file_sum' => n,
	'errors' => [  
		10 => $line,
		8130 => $line,
		231745 => $line,
		...
	]
]
```

## Note
Dont forget to check if the file exists.

Usefull methods
- [file_exists](https://www.php.net/manual/en/function.file-exists)
- [fgetcsv](https://www.php.net/manual/en/function.fgetcsv.php)

## About the exercise
Common topic - parsing/processing an invoice file.  

Usually there will be many of these scripts, each used for a certain billing system or a specific customer using a certain system, as there are multitudes of variations even though the same billing system produced the file. An invoice file from billing system A produced for customer X and Y may have significant differences in its structure and data formating between X and Y.

The amount of errors within such invoice files can be astounding -Missing fields, bad data, misaligned comas etc.  

In reality the processing part can be a mess of different rules and interpretations of the invoice file depending on what customer and billing system produced it.
