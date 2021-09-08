<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait GeneralSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#general-settings
	 *
	 * @var array $schema
	 */
	protected $general_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Store Address.
			'store_address'               => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'store_address_2'             => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'store_city'                  => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'default_country'             => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'store_postcode'              => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// General options.
			'allowed_countries'           => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'specific_allowed_countries'  => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'all_except_countries'  => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'ship_to_countries'           => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'specific_ship_to_countries'  => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'default_customer_address'    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'calc_taxes'                  => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'enable_coupons'              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'calc_discounts_sequentially' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Currency options.
			'currency'                    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'currency_pos'                => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'price_thousand_sep'          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'price_decimal_sep'           => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'price_num_decimals'          => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
