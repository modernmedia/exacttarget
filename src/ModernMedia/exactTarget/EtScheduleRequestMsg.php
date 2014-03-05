<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtScheduleRequestMsg extends EtBaseClass
{
    public $Options; // EtScheduleOptions
    public $Action; // String
    public $Schedule; // EtScheduleDefinition
    public $Interactions; // EtInteractions
}

