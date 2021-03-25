<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait ShippingSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#shipping-settings
	 *
	 * @var array $schema
	 */
	protected $shipping_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Shipping options.
			'enable_shipping_calc'           => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'shipping_cost_requires_address' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'ship_to_destination'            => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'shipping_debug_mode'            => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
