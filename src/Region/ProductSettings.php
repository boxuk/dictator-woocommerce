<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait ProductSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#product-settings
	 *
	 * @var array $schema
	 */
	protected $product_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// General - Shop pages.
			'shop_page_id'                         => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'cart_redirect_after_add'              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'enable_ajax_add_to_cart'              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'placeholder_image'                    => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// General - Measurements.
			'weight_unit'                          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'dimension_unit'                       => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// General - Reviews.
			'enable_reviews'                       => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'review_rating_verification_label'     => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'review_rating_verification_required'  => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'enable_review_rating'                 => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'review_rating_required'               => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Inventory.
			'manage_stock'                         => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'hold_stock_minutes'                   => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'notify_low_stock'                     => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'notify_no_stock'                      => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'stock_email_recipient'                => array(
				'_type'         => 'email',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'notify_low_stock_amount'              => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'notify_no_stock_amount'               => array(
				'_type'         => 'numeric',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'hide_out_of_stock_items'              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'stock_format'                         => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Downloadable Products.
			'file_download_method'                 => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'downloads_require_login'              => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'downloads_grant_access_after_payment' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'downloads_add_hash_to_filename'       => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
