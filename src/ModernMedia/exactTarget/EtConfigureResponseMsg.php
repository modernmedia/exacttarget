<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtConfigureResponseMsg extends EtBaseClass
{
    public $Results; // EtResults
    public $OverallStatus; // String
    public $OverallStatusMessage; // String
    public $RequestID; // String
}

