<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtVersionInfoResponse extends EtBaseClass
{
    public $Version; // String
    public $VersionDate; // dateTime
    public $Notes; // String
    public $VersionHistory; // EtVersionInfoResponse
}

