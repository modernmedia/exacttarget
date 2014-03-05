<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtMonthlyRecurrence extends EtBaseClass
{
    public $MonthlyRecurrencePatternType; // EtMonthlyRecurrencePatternTypeEnum
    public $MonthlyInterval; // int
    public $ScheduledDay; // int
    public $ScheduledWeek; // EtWeekOfMonthEnum
    public $ScheduledDayOfWeek; // EtDayOfWeekEnum
}

