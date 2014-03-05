<?php

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtAsyncResponse extends EtBaseClass
{
    public $ResponseType; // EtAsyncResponseType
    public $ResponseAddress; // String
    public $RespondWhen; // EtRespondWhen
    public $IncludeResults; // boolean
    public $IncludeObjects; // boolean
    public $OnlyIncludeBase; // boolean
}