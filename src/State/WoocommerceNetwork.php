<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\State;

use BoxUk\Dictator\State\Network;
use BoxUk\DictatorWooCommerce\Region\WoocommerceNetworkSites;

class WoocommerceNetwork extends Network
{
    /**
     * Specify required regions for the state.
     *
     * @var string[]
     */
    protected array $woocommerceRegions = [
        'sites' => WoocommerceNetworkSites::class,
    ];

    /**
     * Rather than dictate a woocommerce state, this merges with the site state to ensure we can configure woocommerce beneath site.
     *
     * @param null $yaml Yaml settings that is passed to the parent.
     */
    public function __construct($yaml = null)
    {
        parent::__construct($yaml);

        $this->regions = array_merge(
            $this->regions,
            $this->woocommerceRegions
        );
    }
}
