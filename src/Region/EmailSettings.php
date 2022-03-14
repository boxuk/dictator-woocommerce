<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait EmailSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#email-settings
     *
     * @var array $emailSettingsSchema
     */
    protected array $emailSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Email sender options.
            'email_from_name' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_from_address' => [
                '_type' => 'email',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Email template.
            'email_header_image' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_footer_text' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_base_color' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_background_color' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_body_background_color' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'email_text_color' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Store management insights.
            'merchant_email_notifications' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
