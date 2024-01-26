# Instructions

To properly create an invoice PDF you need the net price & vat. An older system you are interacting with is not providing this in their billing information.

**Given the gross price of a product and the vat percentage, calculate the original net price & vat sum for the product.**

### Round the net price & vat accordingly
- 2.5 becomes 3
- 2.4 becomes 2

## Note
- Make use of the PHP [round](https://www.php.net/manual/en/function.round.php) method.
- [Percentage](https://www.math.net/percentage)
- [Wikipedia on percentage](https://en.wikipedia.org/wiki/Percentage)

## About the exercise
Working with a system that handles billing data can be cumbersome. Many different systems to interact with and all of them have their own idéa on how to best structure their data. Some of theses systems, old systems, did not bother to include net prices & vat in their data model.