<?php
/**
 * Slince shipment tracker library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\ShipmentTracking\Foundation;

use Slince\ShipmentTracking\Foundation\Location\LocationInterface;

class ShipmentEvent implements \JsonSerializable
{
    /**
     * @var \DateTime
     * @deprecated
     */
    protected $date;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string|LocationInterface
     */
    protected $location;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $time;

    public function __construct(\DateTime $time = null, $description = null, $location = null)
    {
        $this->setTime($time);
        $this->description = $description;
        $this->location = $location;
    }

    /**
     * @return \DateTime
     * @deprecated
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return ShipmentEvent
     * @deprecated
     */
    public function setDate($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        $this->setTime($date);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return ShipmentEvent
     */
    public function setTime($time)
    {
        $this->time = $time;
        if ($time) {
            $this->date = $time->format('Y-m-d H:i:s');
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ShipmentEvent
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|LocationInterface
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string|LocationInterface $location
     * @return ShipmentEvent
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ShipmentEvent
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Creates an event from an array
     * @param array $data
     * @return static
     */
    public static function fromArray($data)
    {
        $event = new static();
        foreach ($data as $property => $value) {
            if (method_exists($event, $method = 'set' . ucfirst($property))) {
                $event->$method($value);
            }
        }
        return $event;
    }

    /**
     * Converts the event to array
     * @return array
     */
    public function toArray()
    {
        $methods = get_class_methods($this);
        $data = [];
        foreach ($methods as $method) {
            if (substr($method, 0, 3) == 'get') {
                $property = lcfirst(substr($method, 3));
                $data[$property] = $this->$method();
            } elseif (substr($method, 0, 2) == 'is') {
                $property = lcfirst(substr($method, 2));
                $data[$property] = $this->$method();
            }
        }
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
