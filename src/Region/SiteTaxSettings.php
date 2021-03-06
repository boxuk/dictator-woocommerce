<?php

namespace BoxUk\DictatorWooCommerce\Region;

use Dictator;
use Dictator\Regions\Region;

final class SiteTaxSettings extends Region {
	use Util;
	use TaxSettings;

	/**
	 * Return our schema.
	 *
	 * @return array
	 */
	public function get_schema() {
		return $this->tax_settings_schema;
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
				case 'prices_include_tax':
				case 'tax_round_at_subtotal':
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
			case 'prices_include_tax':
			case 'tax_round_at_subtotal':
				$yes_or_no = get_option( self::normalise_option( $name ), 'no' );
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
