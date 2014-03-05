<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;

class EtImportDefinitionUpdateType extends EtBaseClass
{
    const AddAndUpdate      = 'AddAndUpdate';
    const AddAndDoNotUpdate = 'AddAndDoNotUpdate';
    const UpdateButDoNotAdd = 'UpdateButDoNotAdd';
    const Merge             = 'Merge';
    const Overwrite         = 'Overwrite';
}

