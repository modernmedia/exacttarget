<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtBounceEvent extends EtBaseClass
{
    public $SMTPCode; // String
    public $BounceCategory; // String
    public $SMTPReason; // String
    public $BounceType; // String
}

