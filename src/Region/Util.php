<?php

namespace BoxUk\DictatorWooCommerce\Region;

trait Util {
	/**
	 * Normalises option by adding WooCommerce prefix if not present.
	 *
	 * @param string $option Option name.
	 *
	 * @return string
	 */
	public static function normalise_option( $option ) {
		if ( strpos( $option, 'woocommerce_' ) !== 0 ) {
			$option = 'woocommerce_' . $option;
		}

		return $option;
	}
}
