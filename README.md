# Shipment Tracking Library

[![Build Status](https://img.shields.io/travis/slince/shipment-tracking-foundation/master.svg?style=flat-square)](https://travis-ci.org/slince/shipment-tracking-foundation)
[![Coverage Status](https://img.shields.io/codecov/c/github/slince/shipment-tracking-foundation.svg?style=flat-square)](https://codecov.io/github/slince/shipment-tracking-foundation)
[![Latest Stable Version](https://img.shields.io/packagist/v/slince/shipment-tracking-foundation.svg?style=flat-square&label=stable)](https://packagist.org/packages/slince/shipment-tracking-foundation)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/slince/shipment-tracking-foundation.svg?style=flat-square)](https://scrutinizer-ci.com/g/slince/shipment-tracking-foundation/?branch=master)

A flexible and shipment tracking library for multi carriers.

## Basic Usage

```php

$tracker = new Slince\ShipmentTracking\DHLECommerce\DHLECommerceTracker(CLIENT_ID, PASSWORD);

try {
   $shipment = $tracker->track('CNAQV100168101');
   
   if ($shipment->isDelivered()) {
       echo "Delivered";
   }
   echo $shipment->getOrigin();
   echo $shipment->getDestination();
   print_r($shipment->getEvents());  //print the shipment events
   
} catch (Slince\ShipmentTracking\Exception\TrackException $exception) {
    exit('Track error: ' . $exception->getMessage());
}

```

All shipment trackers must implement `Slince\ShipmentTracking\Foundation\TrackerInterface`, and will usually extend `Slince\ShipmentTracking\Foundation\HttpAwareTracker` for basic functionality if the carrier's api is based on
HTTP

## Shipment trackers:

The following carriers are available:

| Tracker | Composer Package | Maintainer |
| --- | --- | --- |
| [DHL eCommerce](https://github.com/slince/shipment-tracking)| slince/shipment-tracking | [Tao](https://github.com/slince) |
| [Yanwen Exprerss(燕文物流)](https://github.com/slince/shipment-tracking)| slince/shipment-tracking | [Tao](https://github.com/slince) |
| [快递100](https://github.com/slince/shipment-tracking)| slince/shipment-tracking-foundation | [Tao](https://github.com/slince) |
| [E邮宝/E包裹/E特快/国际EMS](https://github.com/slince/shipment-tracking)| slince/shipment-tracking | [Tao](https://github.com/slince) |

## License
 
The MIT license. See [MIT](https://opensource.org/licenses/MIT)

