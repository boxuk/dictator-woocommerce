<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait ShippingSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#shipping-settings
     *
     * @var array $shippingSettingsSchema
     */
    protected array $shippingSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Shipping options.
            'enable_shipping_calc' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'shipping_cost_requires_address' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'ship_to_destination' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'shipping_debug_mode' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
