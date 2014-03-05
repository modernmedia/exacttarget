<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtQueryDefinition extends EtBaseClass
{
    public $QueryText; // String
    public $TargetType; // String
    public $DataExtensionTarget; // EtInteractionBaseObject
    public $TargetUpdateType; // String
    public $FileSpec; // String
    public $FileType; // String
    public $Status; // String
}

