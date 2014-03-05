<?php

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtTaskResult extends EtBaseClass
{
    public $StatusCode; // String
    public $StatusMessage; // String
    public $OrdinalID; // int
    public $ErrorCode; // int
    public $ID; // String
    public $InteractionObjectID; // String
}