<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait TaxSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#tax-settings
     *
     * @var array $taxSettingsSchema
     */
    protected array $taxSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Tax options.
            'prices_include_tax' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_based_on' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'shipping_tax_class' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_round_at_subtotal' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_classes' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_display_shop' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_display_cart' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'price_display_suffix' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'tax_total_display' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
