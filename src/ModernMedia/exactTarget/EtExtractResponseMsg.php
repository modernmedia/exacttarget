<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtExtractResponseMsg extends EtBaseClass
{
    public $OverallStatus; // String
    public $RequestID; // String
    public $Results; // EtExtractResult
}

