<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait TaxSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#tax-settings
	 *
	 * @var array $schema
	 */
	protected $tax_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Tax options.
			'prices_include_tax'    => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_based_on'          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'shipping_tax_class'    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_round_at_subtotal' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_classes'           => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_display_shop'      => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_display_cart'      => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'price_display_suffix'  => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'tax_total_display'     => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
