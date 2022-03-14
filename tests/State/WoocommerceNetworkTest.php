<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Tests\State;

use BoxUk\Dictator\Dictator;
use BoxUk\DictatorWooCommerce\State\WoocommerceNetwork;

class WoocommerceNetworkTest extends WoocommerceStateTestCase
{
    protected string $stateName = 'network';

    public function setUp(): void
    {
        Dictator::addState($this->stateName, WoocommerceNetwork::class);
    }
}
