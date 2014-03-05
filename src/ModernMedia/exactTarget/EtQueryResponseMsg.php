<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtQueryResponseMsg extends EtBaseClass
{
    public $OverallStatus; // String
    public $RequestID; // String
    public $Results; // EtAPIObject
}
