<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait AccountsSettings {
	/**
	 * Schema config.
	 *
	 * @see https://docs.woocommerce.com/document/configuring-woocommerce-settings/#accounts-and-privacy-settings
	 *
	 * @var array $schema
	 */
	protected $accounts_settings_schema = array(
		'_type'     => 'array',
		'_children' => array(
			// Guest checkout.
			'enable_guest_checkout'                 => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'enable_checkout_login_reminder'        => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Account creation.
			'enable_signup_and_login_from_checkout' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'enable_myaccount_registration'         => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'registration_generate_username'        => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'registration_generate_password'        => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Account erasure requests.
			'erasure_request_removes_order_data'    => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'erasure_request_removes_download_data' => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Personal data removal.
			'allow_bulk_remove_personal_data'       => array(
				'_type'         => 'bool',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Privacy policy.
			'registration_privacy_policy_text'      => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'checkout_privacy_policy_text'          => array(
				'_type'         => 'text',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			// Personal data retention.
			'delete_inactive_accounts'              => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'trash_pending_orders'                  => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'trash_failed_orders'                   => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'trash_cancelled_orders'                => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
			'anonymize_completed_orders'            => array(
				'_type'         => 'array',
				'_required'     => false,
				'_get_callback' => 'get',
			),
		),
	);
}
