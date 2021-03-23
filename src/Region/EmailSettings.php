<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait EmailSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#email-settings
	 *
	 * @var array $schema
	 */
	protected $email_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Email sender options.
			'email_from_name'              => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_from_address'           => array(
				'_type'         => 'email',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Email template.
			'email_header_image'           => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_footer_text'            => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_base_color'             => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_background_color'       => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_body_background_color'  => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'email_text_color'             => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Store management insights.
			'merchant_email_notifications' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
