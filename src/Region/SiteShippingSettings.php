<?php

namespace BoxUk\DictatorWooCommerce\Region;

use Dictator;
use Dictator\Regions\Region;

final class SiteShippingSettings extends Region {
	use Util;
	use ShippingSettings;

	/**
	 * Return our schema.
	 *
	 * @return array
	 */
	public function get_schema() {
		return $this->shipping_settings_schema;
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
				case 'enable_shipping_calc':
				case 'shipping_cost_requires_address':
				case 'shipping_debug_mode':
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
	public function get( $name ) {
		switch ( $name ) {
			case 'shipping_cost_requires_address':
			case 'shipping_debug_mode':
				$yes_or_no = get_option( self::normalise_option( $name ), 'no' );
				return $yes_or_no === 'yes';
			case 'enable_shipping_calc':
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
