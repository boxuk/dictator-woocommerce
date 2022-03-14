<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Tests\State;

use BoxUk\Dictator\Dictator;
use BoxUk\Dictator\Region\Region;
use PHPUnit\Framework\TestCase;

abstract class WoocommerceStateTestCase extends TestCase
{
    public function test_get_regions_return_array_of_region_objects(): void
    {
        $regions = Dictator::getStateObj($this->stateName)->getRegions();
        $this->assertIsArray($regions);

        foreach ($regions as $region) {
            $this->assertInstanceOf(Region::class, $region);
        }
    }
}
