# Instructions

The OCR is used as a reference number when issuing an invoice. It usually contains information such as the invoice number and/or customer number and is used to map and automate registrations of payments.

In this exercise you are tasked with implementing a function to verify an Swedish OCR number from [Bankgirot](https://www.bankgirot.se/en).  
You will have to verify for variable control length and the checksum.

### OCR

An OCR number consist of a series of digits, ranging from few to many.

Consider the following example, OCR: 84635481891648.
- 14 digits.
- The last digit is the checksum digit, 8.
- Second to last digit is the length of the OCR itself, 4. 

#### Length digit
- The length of the OCR is including the checksum digit.  
- In this example the OCR is 14 digits long, 14 % 10 = 4.  
- The length of the OCR is required to be between 5 to 15 digits.

#### Checksum digit
To verify the OCR checksum number you will have to implement the [Luhn algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm).   
Following the Luhn algorithm,
1. Remove the checksum digit from the OCR.
2. Multiply every second digit, starting with the first digit, with 2 from right to left.  
2.1 The product from every second digit is summarized, example: 7*2 = 14 => 1+4 = *5*. Add 5 to the $sum.  
2.2 Summarize all other digits - every odd digit, to $sum.
3. Calculate the checksum digit: (10 - ( $sum mod 10)) % 10.

## Note
- [Swedish OCR reference control](https://www.bankgirot.se/en/services/incoming-payments/bankgiro-receivables/ocr-reference-control/)

## About the exercise
When handling payment options you do so understandably with great caution. A wrong number in an OCR could mean that the issuer of an invoice wont recieve the payment and the customers money could be on its way to another entities account.  

 But more likely, the OCR would be invalid and therefore no payments can be done as the issuer bank would reject it. This would result in every single invoice from the faulty batch to be sent out again.

Someone, might have, almost, sent about 10 000 invoices or so to print with faulty checksums in the OCR:s.