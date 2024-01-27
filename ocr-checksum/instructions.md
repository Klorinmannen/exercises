# Instructions

When handling payment options you do so understandably with great caution. A wrong number in an OCR could mean that the issuer of an invoice wont recieve the payment and the customers money could be on its way to another entities account. But most likely, the OCR would be invalid and therefore no payments can be done. And every single invoice from the faulty batch has to be sent out again.


In this exercise you are tasked with implementing a function to verify an given OCR number.  
You will have to verify both the length and the checksum.

### OCR

An OCR number consist of a series of digits, ranging from few to many.

Consider the following example, OCR: 81635481891644.
- 14 numbers.
- Last digit is the checksum digit, 4.
- Second last digit is the length of the OCR itself, 4. 

#### Length digit
The length of the OCR is including the checksum digit.  
In this example the OCR is 14 digits long, the 10-th is stripped and we get 4.

#### Checksum digit
To verify the OCR checksum number you will have to implement the [Luhn algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm).   
Following the Luhn algorithm,
1. Remove the length and checksum digits from the OCR.
2. Multiply every second digit, starting with the first digit, with 2 from right to left and summarize.
3. Summarize the all other digits with the result from the previous step.
4. Calculate the checksum digit: 10 - ( s mod 10), where s is the result from the previous step.

## About the exercise
Someone, might have, almost, sent about 10 000 invoices or so to print with faulty checksums in the OCR:s.