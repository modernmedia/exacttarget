<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtMessagingConfiguration extends EtBaseClass
{
    public $Code; // String
    public $MessagingVendorKind; // EtMessagingVendorKind
    public $IsActive; // boolean
    public $Url; // String
    public $UserName; // String
    public $Password; // String
    public $ProfileID; // String
    public $CallbackUrl; // String
    public $MediaTypes; // String
}

