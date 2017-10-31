<?php

namespace Slince\ShipmentTracking\Foundation\Tests\Location;

use PHPUnit\Framework\TestCase;
use Slince\ShipmentTracking\Foundation\Location\LocationInterface;

class LocationTest extends TestCase
{
    public function testBase()
    {
        $location = $this->getMockForAbstractClass(LocationInterface::class);
        $this->assertTrue(method_exists($location, 'toString'));
        $this->assertInstanceOf(\JsonSerializable::class, $location);
        $this->assertTrue(method_exists($location, 'jsonSerialize'));
    }
}