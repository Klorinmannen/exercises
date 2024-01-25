<?php

declare(strict_types=1);

function eventHours(array $event): int
{
	throw new \BadFunctionCallException('Implement the calendarHours function');
}

function isHalfDay(int $hours, int $minutes): bool
{
	throw new \BadFunctionCallException('Implement the isHalfDay function');
}

function isFullDay(int $hours, int $minutes): bool
{
	throw new \BadFunctionCallException('Implement the isFullDay function');
}

function isOvertime(int $hours): bool
{
	throw new \BadFunctionCallException('Implement the isOvertime function');
}
