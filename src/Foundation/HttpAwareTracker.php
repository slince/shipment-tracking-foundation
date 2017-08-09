<?php
/**
 * Slince shipment tracker library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\ShipmentTracking\Foundation;

abstract class HttpAwareTracker implements TrackerInterface, HttpClientAwareInterface
{
    use HttpClientAwareTrait;
}