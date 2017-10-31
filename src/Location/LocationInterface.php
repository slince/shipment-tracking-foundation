<?php
/**
 * Slince shipment tracker library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\ShipmentTracking\Foundation\Location;

use JsonSerializable;

interface LocationInterface extends JsonSerializable
{
    /**
     * Converts to string
     * @return string
     */
    public function toString();
}