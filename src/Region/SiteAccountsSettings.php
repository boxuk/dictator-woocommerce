<?php

namespace BoxUk\DictatorWooCommerce\Region;

use Dictator;
use Dictator\Regions\Region;

final class SiteAccountsSettings extends Region {
	use Util;
	use AccountsSettings;

	/**
	 * Return our schema.
	 *
	 * @return array
	 */
	public function get_schema() {
		return $this->accounts_settings_schema;
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
				case 'enable_guest_checkout':
				case 'enable_checkout_login_reminder':
				case 'enable_signup_and_login_from_checkout':
				case 'enable_myaccount_registration':
				case 'registration_generate_username':
				case 'registration_generate_password':
				case 'erasure_request_removes_order_data':
				case 'erasure_request_removes_download_data':
				case 'allow_bulk_remove_personal_data':
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
			case 'delete_inactive_accounts':
			case 'trash_pending_orders':
			case 'trash_failed_orders':
			case 'trash_cancelled_orders':
			case 'anonymize_completed_orders':
				return get_option( self::normalise_option( $name ), array() );
			case 'enable_checkout_login_reminder':
			case 'enable_signup_and_login_from_checkout':
			case 'enable_myaccount_registration':
			case 'erasure_request_removes_order_data':
			case 'erasure_request_removes_download_data':
			case 'allow_bulk_remove_personal_data':
				$yes_or_no = get_option( self::normalise_option( $name ), 'no' );
				return $yes_or_no === 'yes';
			case 'enable_guest_checkout':
			case 'registration_generate_username':
			case 'registration_generate_password':
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
