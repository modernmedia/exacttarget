<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtPerformResponse extends EtBaseClass
{
    public $StatusCode; // String
    public $StatusMessage; // String
    public $OrdinalID; // int
    public $Results; // EtResults
    public $ErrorCode; // int
}

