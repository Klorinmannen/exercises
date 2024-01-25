# Instructions

You have been tasked together with a colleague to integrate a calendar api a customer.  
The idea is to pull events from the calendar per registered user and extract the number of hours each event lasts.

While your rockstar-developer colleague quickly grabbed the job of integrating with the external calendar api.

**You are assigned the job of implementing a function extracting the hours from the calendar events returned by the api.**

### Calendar event structure

```
$event = [
	'isAllDay' => false|true
	'start' => [
		'dateTIme' => '2022-01-10 08:00:00',
		'timeZone' => 'UTC'
	],
	'end' => [
		'dateTime' => '2022-01-12 16:30:00',
		'timeZone' => 'UTC'
	]
];
```
- Events will always be in time zone UTC.
- All keys from the example will always exists.
- The dateTime strings will be well formated.

### Customer requirements

The customer has a few requirements, or rules, for all hours found in the events.

- Always round to closest hour, at 30 minutes rounding goes up.
- Half-day rules
  - 3 hours and 30 minutes rounded up to 4 hours.
  - 4 hours and 30 minutes rounded down to 4 hours.
- Full-day rules
  - Anything over 6 hours and 30 minutes is rounded up to 8 hours.
- Overtime rules
  - Hours between 18:00 and midnight are multiplied by 2.
- Events spanning multiple days should make use of the same rules for half, full day and overtime rules.
  - The days between starting day and ending day are counted under the full day rule.
- Work day starts at 08:00.
- No special treatment for weekends, treated as weekdays.

## Note

- Make use of [DateTime](https://www.php.net/manual/en/class.datetime.php) 
  or [DateTimeImmutable](https://www.php.net/manual/en/class.datetimeimmutable.php) and their associates.
- Dont forget to utilize the time zone information returned with the event.
- The exercise contains a few empty methods to get your started, you dont have to use them.

## About the exercise 

This exercise is based on a real life situation.
A customer running a consulting business wanted to make their hour reporting easier.
Allowing each consult to tag their calendar events with a pre decided #tag, we were able to pull theses events and automate hour reporting.
With the downside of human errors, no #tag in the body of the events, no hours reported.

The api integrated was [Microsoft graph api](https://learn.microsoft.com/en-us/graph/api/user-list-calendars?view=graph-rest-1.0&tabs=http).
