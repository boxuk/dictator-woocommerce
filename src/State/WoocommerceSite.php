<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\State;

use BoxUk\Dictator\State\Site;
use BoxUk\DictatorWooCommerce\Region\SiteAccountsSettings;
use BoxUk\DictatorWooCommerce\Region\SiteAdvancedSettings;
use BoxUk\DictatorWooCommerce\Region\SiteEmailSettings;
use BoxUk\DictatorWooCommerce\Region\SiteGeneralSettings;
use BoxUk\DictatorWooCommerce\Region\SiteProductSettings;
use BoxUk\DictatorWooCommerce\Region\SiteShippingSettings;
use BoxUk\DictatorWooCommerce\Region\SiteTaxSettings;

class WoocommerceSite extends Site
{
    /**
     * Specify regions required for a WooCommerce Site.
     *
     * @var string[]
     */
    protected array $woocommerceRegions = [
        'woocommerce-general' => SiteGeneralSettings::class,
        'woocommerce-product' => SiteProductSettings::class,
        'woocommerce-tax' => SiteTaxSettings::class,
        'woocommerce-shipping' => SiteShippingSettings::class,
        'woocommerce-accounts' => SiteAccountsSettings::class,
        'woocommerce-email' => SiteEmailSettings::class,
        'woocommerce-advanced' => SiteAdvancedSettings::class,
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
