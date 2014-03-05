<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtDataExtensionUpdateResult extends EtBaseClass
{
    public $ErrorMessage; // String
    public $KeyErrors; // EtKeyErrors
    public $ValueErrors; // EtValueErrors
}

