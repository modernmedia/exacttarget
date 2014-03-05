<?PHP

namespace ModernMedia\exactTarget;

use ModernMedia\exactTarget\EtBaseClass;
use ModernMedia\exactTarget\EtSubscriberList;

/**
 * EtSubscriber (Active Class)
 *
 * Active Classes accept an instance of ModernMedia\exactTarget\EtClient
 * to communicate with the Exact Target server.
 *
 * @package exactTarget
 * @author  Micah Breedlove <ModernMedia@gmail.com>
 * @version 1.0
 */
class EtSubscriber extends EtBaseClass
{

    const ACTIVE       = 'Active';
    const BOUNCED      = 'Bounced';
    const HELD         = 'Held';
    const UNSUBSCRIBED = 'Unsubscribed';
    const DELETED      = 'Deleted';

    private $_new = true;
    protected $client;
    public $EmailAddress; // String
    public $Attributes; // array() of EtAttribute
    public $SubscriberKey; // String
    public $UnsubscribedDate; // dateTime
    public $Status; // EtSubscriberStatus
    public $PartnerType; // String
    public $EmailTypePreference; // EtEmailType
    public $Lists; // EtSubscriberList
    public $GlobalUnsubscribeCategory; // EtGlobalUnsubscribeCategory
    public $SubscriberTypeDefinition; // EtSubscriberTypeDefinition

    /**
     * allow for passing optional client class to [some] Et-classes
     * so they can take advantage of client specific functions.
     * e.g. send() and save()
     *
     * @param ModernMedia\exactTarget\EtClient $EtClient
     */
    public function __construct($EtClient = null)
    {
        $this->client = $EtClient;
    }

    /**
     * Used for setting client after class instantiation
     *
     * @param ModernMedia\exactTarget\EtClient $EtClient
     */
    public function setClient($EtClient)
    {
        $this->client = $EtClient;
    }

    /**
     * Get active client instance.
     *
     * @return ModernMedia\exactTarget\EtClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * save() - uses (EtClient) $this->client  to save/update
     *
     */
    public function save()
    {
        $this->client->updateSubscriber($this);
    }

    /**
     * find() - find give find at least a subscriberKey (email addy) and it will
     * recall a subscriber.
     *
     * @param string $subscriberKey
     * @param string $emailAddress
     * @param array  $options - Multidimensional array of other optional data about a subscriber should be in the following co
     *                        array(
     *             'Name'     => 'SubscriberKey',
     *             'operator' => 'equals',
     *             'Value'    => $subscriberKey,
     *         ),
     */
    public function find($subscriberKey, $emailAddress = null, $options = array())
    {
        $subscriberInfo = array(
            array(
                'Name'     => 'SubscriberKey',
                'operator' => 'equals',
                'Value'    => $subscriberKey,
            ),
        );

        if (!is_null($emailAddress)) {
            $subscriberInfo[] = array(
                'Name'     => 'EmailAddress',
                'operator' => 'equals',
                'Value'    => $emailAddress,
            );
        }
        if (!empty($options)) {
            $subscriberInfo = array_merge($subscriberInfo, $options);
        }

        if ($newSub = $this->client->recallSubscriber($subscriberInfo)) {
            $this->reAssign($newSub);
            $this->setNotNew();
        } else {
            $this->populateNew($subscriberInfo);
        }
    }

    /**
     * Used for filling existing object with the data used when locating a subscriber.
     * @see find() $options array
     *
     * @param array $subscriberInfo
     */
    protected function populateNew($subscriberInfo)
    {
        foreach ($subscriberInfo as $info) {
            if (strtolower($info['operator']) == "equals") {
                $this->set($info['Name'], $info['Value']);
            }
        }
    }

    /**
     * getAttribute() - returns an EtAttribute object from ($this) Subscriber
     *
     * @param string $attributeName
     *
     */
    public function getAttribute($attributeName)
    {
        $attributes = $this->getAttributes();
        foreach ($attributes as $key => $object) {
            if (strtolower($object->Name) == strtolower($attributeName)) {
                return $this->cast($object, new EtAttribute());
            }
        }
    }

    /**
     * Takes an EtAttribute removes the existing attribute from the object and sets the new one.
     * OR
     * Adds an EtAttribute  to the current subscriber.
     *
     * @param ModernMedia\exactTarget\EtAttribute $EtAttribute
     *
     * @return boolean
     * @throws \Exception
     */
    public function updateAttribute($EtAttribute)
    {
        if (!($EtAttribute instanceof \ModernMedia\exactTarget\EtAttribute)) {
            throw new \Exception(" updateAttribute expects an instance of \ModernMedia\exactTarget\EtAttribute and was given " . get_class(
                $EtAttribute
            ) . ". ");
        }
        $nameToUpdate = $EtAttribute->getName();
        $attributes   = $this->getAttributes();
        foreach ($attributes as $key => $object) {
            if (strtolower($object->Name) == strtolower($nameToUpdate)) {
                unset($attributes[$key]);
                continue;
            }
        }
        $attributes[]     = $EtAttribute;
        $this->Attributes = array_values($attributes);

        return true;
    }

    /**
     * @param int $listId EtList->getID()
     */
    public function addToList($listId)
    {
        $slist = new EtSubscriberList();
        $slist->setID($listId);
        $slist->setAction("create");
        $list          = $this->client->soapCall($slist);
        $this->Lists[] = $list;
    }

    /**
     * Sets the object into a not new status
     *
     * @return $this
     */
    private function setNotNew()
    {
        $this->_new = false;

        return $this;
    }

    /**
     * Determines if an object is new or a retrieved record from ExactTarget
     *
     * @return boolean
     */
    public function isNew()
    {
        return $this->_new;
    }

}
