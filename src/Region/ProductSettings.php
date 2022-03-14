<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait ProductSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#product-settings
     *
     * @var array $productSettingsSchema
     */
    protected array $productSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // General - Shop pages.
            'shop_page_id' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'cart_redirect_after_add' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'enable_ajax_add_to_cart' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'placeholder_image' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // General - Measurements.
            'weight_unit' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'dimension_unit' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // General - Reviews.
            'enable_reviews' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'review_rating_verification_label' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'review_rating_verification_required' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'enable_review_rating' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'review_rating_required' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Inventory.
            'manage_stock' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'hold_stock_minutes' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'notify_low_stock' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'notify_no_stock' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'stock_email_recipient' => [
                '_type' => 'email',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'notify_low_stock_amount' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'notify_no_stock_amount' => [
                '_type' => 'numeric',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'hide_out_of_stock_items' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'stock_format' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Downloadable Products.
            'file_download_method' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'downloads_require_login' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'downloads_grant_access_after_payment' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'downloads_add_hash_to_filename' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
