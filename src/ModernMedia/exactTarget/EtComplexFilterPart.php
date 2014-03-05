<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtComplexFilterPart extends EtBaseClass
{
    public $LeftOperand; // EtFilterPart
    public $LogicalOperator; // EtLogicalOperators
    public $RightOperand; // EtFilterPart
}

