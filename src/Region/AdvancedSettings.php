<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait AdvancedSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#section-25 (?!)
     *
     * @var array $advancedSettingsSchema
     */
    protected array $advancedSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Page setup.
            'cart_page_id' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'checkout_page_id' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_page_id' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'terms_page_id' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'force_ssl_checkout' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'unforce_ssl_checkout' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Checkout endpoints.
            'checkout_pay_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'checkout_order_received_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_add_payment_method_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_delete_payment_method_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_set_default_payment_method_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Account endpoints.
            'myaccount_orders_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_view_order_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_downloads_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_edit_account_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_edit_address_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_payment_methods_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'myaccount_lost_password_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'logout_endpoint' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Legacy API.
            'api_enabled' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // WooCommerce.com Usage Tracking.
            'allow_tracking' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // WooCommerce.com Marketplace suggestions.
            'show_marketplace_suggestions' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
