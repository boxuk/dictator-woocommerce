<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Tests\State;

use BoxUk\Dictator\Dictator;
use BoxUk\DictatorWooCommerce\State\WoocommerceSite;

class WoocommerceSiteTest extends WoocommerceStateTestCase
{
    protected string $stateName = 'site';

    public function setUp(): void
    {
        Dictator::addState($this->stateName, WoocommerceSite::class);
    }
}
