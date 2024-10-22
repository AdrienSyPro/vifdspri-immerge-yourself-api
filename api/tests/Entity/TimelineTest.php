<?php

namespace App\Tests\Entity;

use App\Entity\Timeline;
use DateTime;
use PHPUnit\Framework\TestCase;

class TimelineTest extends TestCase
{
    /**
     * @dataProvider durationInYearDataProvider
     */
    public function testGetDurationInMonths(DateTime $startDate, DateTime $endDate, float $expectedDuration): void
    {
        $timeline = new Timeline();

        $timeline->setStartDate($startDate);
        $timeline->setEndDate($endDate);

        $this->assertEquals($expectedDuration, $timeline->getDurationInMonths());
    }

    public function durationInYearDataProvider(): array
    {
        return [
            // Test case 1: 1 year and 6 months
            [new DateTime('2020-01-01'), new DateTime('2021-07-01'), 18.0],
            // Test case 2: 2 years
            [new DateTime('2019-01-01'), new DateTime('2021-01-01'), 24.0],
            // Test case 3: 1 year and 0 months
            [new DateTime('2020-01-01'), new DateTime('2021-01-01'), 12.0],
            // Test case 4: 3 years and 5 months
            [new DateTime('2020-01-01'), new DateTime('2023-06-01'), 41.0],
            // Test case 5: Edge case, same date
            [new DateTime('2023-10-01'), new DateTime('2023-10-01'), 0.0],
        ];
    }
}