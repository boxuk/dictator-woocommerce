<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait AccountsSettings
{
    /**
     * Schema config.
     *
     * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#accounts-and-privacy-settings
     *
     * @var array $accountsSettingsSchema
     */
    protected array $accountsSettingsSchema = [
        '_type' => 'array',
        '_children' => [
            // Guest checkout.
            'enable_guest_checkout' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'enable_checkout_login_reminder' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Account creation.
            'enable_signup_and_login_from_checkout' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'enable_myaccount_registration' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'registration_generate_username' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'registration_generate_password' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Account erasure requests.
            'erasure_request_removes_order_data' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'erasure_request_removes_download_data' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Personal data removal.
            'allow_bulk_remove_personal_data' => [
                '_type' => 'bool',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Privacy policy.
            'registration_privacy_policy_text' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'checkout_privacy_policy_text' => [
                '_type' => 'text',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            // Personal data retention.
            'delete_inactive_accounts' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'trash_pending_orders' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'trash_failed_orders' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'trash_cancelled_orders' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
            'anonymize_completed_orders' => [
                '_type' => 'array',
                '_required' => false,
                '_get_callback' => 'get',
            ],
        ],
    ];
}
