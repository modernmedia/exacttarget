<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

/**
 * EtAttribute (Passive Class)
 *
 * Passive classes do not directly communicate with the Exact Target server.
 *
 * @package exactTarget
 * @author  Micah Breedlove <ModernMedia@gmail.com>
 * @version 1.0
 */

class EtAttribute extends EtBaseClass
{
    public $Name; // string
    public $Value; // string

    public function __construct($name = null, $value = null)
    {
        if (!is_null($name)) {
            $this->Name = $name;
        }
        if (!is_null($value)) {
            $this->Value = $value;
        }
    }

}
