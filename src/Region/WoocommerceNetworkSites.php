<?php

namespace BoxUk\DictatorWooCommerce\Region;

use Dictator\Regions\Network_Sites;

final class WoocommerceNetworkSites extends Network_Sites {
	use Util;
	use GeneralSettings;
	use ProductSettings;
	use TaxSettings;
	use ShippingSettings;
	use AccountsSettings;
	use EmailSettings;
	use AdvancedSettings;

	/**
	 * Return our schema.
	 *
	 * @return array
	 */
	public function get_schema() {
		$parent_schema = parent::get_schema();
		// General.
		$parent_schema['_prototype']['_children']['woocommerce-general'] = array(
			'_type'     => $this->general_settings_schema['_type'],
			'_children' => $this->general_settings_schema['_children'],
		);

		// Product.
		$parent_schema['_prototype']['_children']['woocommerce-product'] = array(
			'_type'     => $this->product_settings_schema['_type'],
			'_children' => $this->product_settings_schema['_children'],
		);

		// Tax.
		$parent_schema['_prototype']['_children']['woocommerce-tax'] = array(
			'_type'     => $this->tax_settings_schema['_type'],
			'_children' => $this->tax_settings_schema['_children'],
		);

		// Shipping.
		$parent_schema['_prototype']['_children']['woocommerce-shipping'] = array(
			'_type'     => $this->shipping_settings_schema['_type'],
			'_children' => $this->shipping_settings_schema['_children'],
		);

		// Accounts.
		$parent_schema['_prototype']['_children']['woocommerce-accounts'] = array(
			'_type'     => $this->accounts_settings_schema['_type'],
			'_children' => $this->accounts_settings_schema['_children'],
		);

		// Email.
		$parent_schema['_prototype']['_children']['woocommerce-email'] = array(
			'_type'     => $this->email_settings_schema['_type'],
			'_children' => $this->email_settings_schema['_children'],
		);

		// Advanced.
		$parent_schema['_prototype']['_children']['woocommerce-advanced'] = array(
			'_type'     => $this->advanced_settings_schema['_type'],
			'_children' => $this->advanced_settings_schema['_children'],
		);

		$this->schema = $parent_schema;

		return $this->schema;
	}

	/**
	 * Impose some state data onto a region. Use parent unless an option has a woocommerce prefix.
	 *
	 * @param string $key Site slug.
	 * @param array  $value Site data.
	 * @return true|WP_Error
	 */
	public function impose( $key, $value ) {
		$site = $this->get_site( $key );
		if ( ! $site ) {
			$site = $this->create_site( $key, $value );
			if ( is_wp_error( $site ) ) {
				return $site;
			}
		}
		switch_to_blog( $site->blog_id );
		foreach ( $value as $option => $content ) {
			if ( strpos( $option, 'woocommerce' ) !== 0 ) {
				parent::impose( $key, array( $option => $content ) );
				continue;
			}

			switch ( $option ) {
				case 'woocommerce-general':
					foreach ( $content as $woo_general_field => $woo_general_value ) {
						switch ( $woo_general_field ) {
							case 'calc_taxes':
							case 'enable_coupons':
							case 'calc_discounts_sequentially':
								$woo_general_value = $woo_general_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_general_field ), $woo_general_value );
					}
					break;
				case 'woocommerce-product':
					foreach ( $content as $woo_product_field => $woo_product_value ) {
						switch ( $woo_product_field ) {
							case 'cart_redirect_after_add':
							case 'enable_ajax_add_to_cart':
							case 'enable_reviews':
							case 'review_rating_verification_label':
							case 'review_rating_verification_required':
							case 'enable_review_rating':
							case 'review_rating_required':
							case 'manage_stock':
							case 'notify_low_stock':
							case 'notify_no_stock':
							case 'hide_out_of_stock_items':
							case 'downloads_require_login':
							case 'downloads_grant_access_after_payment':
							case 'downloads_add_hash_to_filename':
								$woo_product_value = $woo_product_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_product_field ), $woo_product_value );
					}
					break;
				case 'woocommerce-tax':
					foreach ( $content as $woo_tax_field => $woo_tax_value ) {
						switch ( $woo_tax_field ) {
							case 'prices_include_tax':
							case 'tax_round_at_subtotal':
								$woo_tax_value = $woo_tax_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_tax_field ), $woo_tax_value );
					}
					break;
				case 'woocommerce-shipping':
					foreach ( $content as $woo_shipping_field => $woo_shipping_value ) {
						switch ( $woo_shipping_field ) {
							case 'enable_shipping_calc':
							case 'shipping_cost_requires_address':
							case 'shipping_debug_mode':
								$woo_shipping_value = $woo_shipping_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_shipping_field ), $woo_shipping_value );
					}
					break;
				case 'woocommerce-accounts':
					foreach ( $content as $woo_accounts_field => $woo_accounts_value ) {
						switch ( $woo_accounts_field ) {
							case 'enable_guest_checkout':
							case 'enable_checkout_login_reminder':
							case 'enable_signup_and_login_from_checkout':
							case 'enable_myaccount_registration':
							case 'registration_generate_username':
							case 'registration_generate_password':
							case 'erasure_request_removes_order_data':
							case 'erasure_request_removes_download_data':
							case 'allow_bulk_remove_personal_data':
								$woo_accounts_value = $woo_accounts_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_accounts_field ), $woo_accounts_value );
					}
					break;
				case 'woocommerce-email':
					foreach ( $content as $woo_email_field => $woo_email_value ) {
						switch ( $woo_email_field ) {
							case 'merchant_email_notifications':
								$woo_email_value = $woo_email_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_email_field ), $woo_email_value );
					}
					break;
				case 'woocommerce-advanced':
					foreach ( $content as $woo_adv_field => $woo_adv_value ) {
						switch ( $woo_adv_field ) {
							case 'force_ssl_checkout':
							case 'unforce_ssl_checkout':
							case 'api_enabled':
							case 'allow_tracking':
							case 'show_marketplace_suggestions':
								$woo_adv_value = $woo_adv_value === true ? 'yes' : 'no';
								break;
						}
						update_option( self::normalise_option( $woo_adv_field ), $woo_adv_value );
					}
					break;
			}
		}
		restore_current_blog();

		return true;
	}

	/**
	 * Retrieves option name. This differs from the version in the trait as it switches to the relevant site first.
	 *
	 * @param string $name Option name.
	 * @return mixed|void
	 */
	public function get( $name ) {

		$site_slug = $this->current_schema_attribute_parents[0];
		$site      = $this->get_site( $site_slug );

		switch_to_blog( $site->blog_id );
		switch ( $name ) {
			case 'specific_allowed_countries':
			case 'specific_ship_to_countries':
			case 'delete_inactive_accounts':
			case 'trash_pending_orders':
			case 'trash_failed_orders':
			case 'trash_cancelled_orders':
			case 'anonymize_completed_orders':
				$value = get_option( self::normalise_option( $name ), array() );
				break;
			case 'calc_taxes':
			case 'calc_discounts_sequentially':
			case 'cart_redirect_after_add':
			case 'review_rating_verification_required':
			case 'hide_out_of_stock_items':
			case 'downloads_require_login':
			case 'prices_include_tax':
			case 'tax_round_at_subtotal':
			case 'shipping_cost_requires_address':
			case 'shipping_debug_mode':
			case 'enable_checkout_login_reminder':
			case 'enable_signup_and_login_from_checkout':
			case 'enable_myaccount_registration':
			case 'erasure_request_removes_order_data':
			case 'erasure_request_removes_download_data':
			case 'allow_bulk_remove_personal_data':
			case 'merchant_email_notifications':
			case 'force_ssl_checkout':
			case 'unforce_ssl_checkout':
			case 'api_enabled':
			case 'allow_tracking':
				$yes_or_no = get_option( self::normalise_option( $name ), 'no' );
				$value     = $yes_or_no === 'yes';
				break;
			case 'enable_coupons':
			case 'enable_ajax_add_to_cart':
			case 'enable_reviews':
			case 'review_rating_verification_label':
			case 'enable_review_rating':
			case 'review_rating_required':
			case 'manage_stock':
			case 'notify_low_stock':
			case 'notify_no_stock':
			case 'downloads_grant_access_after_payment':
			case 'downloads_add_hash_to_filename':
			case 'enable_shipping_calc':
			case 'enable_guest_checkout':
			case 'registration_generate_username':
			case 'registration_generate_password':
			case 'show_marketplace_suggestions':
				$yes_or_no = get_option( self::normalise_option( $name ), 'yes' );
				$value     = $yes_or_no === 'yes';
				break;
			default:
				$value = get_option( self::normalise_option( $name ) );
				break;
		}

		restore_current_blog();
		return $value;
	}
}
