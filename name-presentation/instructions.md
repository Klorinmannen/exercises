# Instructions

A user has a firstname, a lastname and a username.

Example: John, Doe, john.doe86@example.com

**Implement a method formating a users name for presentation.**

### Name formating
- Names are presented with first letter in upper case.
- if firstname and lastname exists, "Firstname L".
- if firstname or lastname is missing, use the one that do exist.
- if firstname and lastname are missing, use the "name" infront of @ from the username.  
  - This "name" is not be capitalized.
- if none exists return "-".

## Note
Helpful PHP methods
- [trim](https://www.php.net/manual/en/function.trim)
- [mb_strtoupper](https://www.php.net/manual/en/function.mb-strtoupper.php)
- [mb_substr](https://www.php.net/manual/en/function.mb-substr)
- [mb_strlen](https://www.php.net/manual/en/function.mb-strlen.php)
- [mb_strpos](https://www.php.net/manual/en/function.mb-strpos)
- [mb_convert_case](https://www.php.net/manual/en/function.mb-convert-case.php)

## About the exercise
Presenting names is common and depending on the usecase it will have different requirements.  
