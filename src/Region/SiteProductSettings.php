<?php

namespace BoxUk\DictatorWooCommerce\Region;

use Dictator;
use Dictator\Regions\Region;

final class SiteProductSettings extends Region {
	use Util;
	use ProductSettings;

	/**
	 * Return our schema.
	 *
	 * @return array
	 */
	public function get_schema() {
		return $this->product_settings_schema;
	}

	/**
	 * Sets data.
	 *
	 * @param null  $_ Unused.
	 * @param mixed $options Options to impose.
	 * @return bool
	 */
	public function impose( $_, $options ) {
		foreach ( $options as $option => $content ) {
			switch ( $option ) {
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
					$content = $content === true ? 'yes' : 'no';
			}
			update_option( self::normalise_option( $option ), $content );
		}

		return true;
	}

	/**
	 * Retrieves option name.
	 *
	 * @param string $name Option name.
	 * @return mixed|void
	 */
	public function get( string $name ) {
		switch ( $name ) {
			case 'cart_redirect_after_add':
			case 'review_rating_verification_required':
			case 'hide_out_of_stock_items':
			case 'downloads_require_login':
				$yes_or_no = get_option( self::normalise_option( $name ), 'no' );
				return $yes_or_no === 'yes';
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
				$yes_or_no = get_option( self::normalise_option( $name ), 'yes' );
				return $yes_or_no === 'yes';
		}

		return get_option( self::normalise_option( $name ) );
	}

	/**
	 * Calculates diff.
	 *
	 * @return array
	 */
	public function get_differences() {
		$result = array(
			'dictated' => $this->get_imposed_data(),
			'current'  => $this->get_current_data(),
		);

		if ( Dictator::array_diff_recursive( $result['dictated'], $result['current'] ) ) {
			return array( 'option' => $result );
		}

		return array();
	}
}
