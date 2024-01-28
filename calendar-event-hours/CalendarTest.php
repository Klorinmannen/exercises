<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
	public static function setUpBeforeClass(): void
	{
		require_once 'Calendar.php';
	}

	public static function eventHoursProvider(): array
	{
		return [
			'0 minute event' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 09:00', 'UTC', false), 0 ],
			'29 minute event' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 09:29', 'UTC', false), 0 ],
			'30 minute event' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 09:30', 'UTC', false), 1 ],
			'1 hour event' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 10:00', 'UTC', false), 1 ],
			'Full work day with overtime' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 22:00', 'UTC', false), 18 ],
			'2 days' => [ static::buildEvent('2023-12-21 09:00', '2023-12-22 17:00', 'UTC', false), 16 ],
			'2 days all day' => [ static::buildEvent('2023-12-21 00:00', '2023-12-23 00:00', 'UTC', true), 16 ],
			'Full work week' => [ static::buildEvent('2023-12-18 09:00', '2023-12-22 17:00', 'UTC', false), 40 ],
			'Half day' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 13:00', 'UTC', false), 4 ],
			'Half day round down' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 13:30', 'UTC', false), 4 ],
			'Half day round up' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 12:30', 'UTC', false), 4 ],
			'Half day is five hours' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 13:31', 'UTC', false), 5 ],
			'Full day round up' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 15:30', 'UTC', false), 8 ],
			'Full day round down' => [ static::buildEvent('2023-12-21 09:00', '2023-12-21 15:29', 'UTC', false), 7 ],
			'Weekend work fri-mon' => [ static::buildEvent('2023-12-22 15:30', '2023-12-25 20:00', 'UTC', false), 32 ],
		];
	}

	public static function buildEvent(string $startDateTime, string $endDateTime, string $timeZone, bool $isAllDay): array
	{
		return [
			'start' => [ 'dateTime' => $startDateTime, 'timeZone' => $timeZone ],
			'end' => [ 'dateTime' => $endDateTime, 'timeZone' => $timeZone ],
			'isAllDay' => $isAllDay,
		];
	}

	#[DataProvider('eventHoursProvider')]
	public function testEventHours(array $event, int $expected): void
	{
		$result = Calendar::eventHours($event);
		$this->assertEquals($expected, $result);
	}
}