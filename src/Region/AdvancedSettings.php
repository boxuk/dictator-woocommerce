<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait AdvancedSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#section-25 (?!)
	 *
	 * @var array $schema
	 */
	protected $advanced_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Page setup.
			'cart_page_id'                             => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'checkout_page_id'                         => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_page_id'                        => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'terms_page_id'                            => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'force_ssl_checkout'                       => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'unforce_ssl_checkout'                     => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Checkout endpoints.
			'checkout_pay_endpoint'                    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'checkout_order_received_endpoint'         => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_add_payment_method_endpoint'    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_delete_payment_method_endpoint' => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_set_default_payment_method_endpoint' => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Account endpoints.
			'myaccount_orders_endpoint'                => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_view_order_endpoint'            => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_downloads_endpoint'             => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_edit_account_endpoint'          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_edit_address_endpoint'          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_payment_methods_endpoint'       => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'myaccount_lost_password_endpoint'         => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'logout_endpoint'                          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Legacy API.
			'api_enabled'                              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// WooCommerce.com Usage Tracking.
			'allow_tracking'                           => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// WooCommerce.com Marketplace suggestions.
			'show_marketplace_suggestions'             => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
