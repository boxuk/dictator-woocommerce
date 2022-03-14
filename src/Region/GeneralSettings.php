<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait GeneralSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#general-settings
     *
     * @var array $generalSettingsSchema
     */
    protected array $generalSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Store Address.
            'store_address' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'store_address_2' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'store_city' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'default_country' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'store_postcode' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // General options.
            'allowed_countries' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'specific_allowed_countries' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'all_except_countries' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'ship_to_countries' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'specific_ship_to_countries' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'default_customer_address' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'calc_taxes' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'enable_coupons' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'calc_discounts_sequentially' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Currency options.
            'currency' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'currency_pos' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'price_thousand_sep' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'price_decimal_sep' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'price_num_decimals' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
