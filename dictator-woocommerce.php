<?php
/**
 * Add WooCommerce region to Dictator.
 */

use BoxUk\DictatorWooCommerce\State\WoocommerceNetwork;
use BoxUk\DictatorWooCommerce\State\WoocommerceSite;

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

if ( ! class_exists( WoocommerceSite::class ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Note this will overwrite the default site and network states, so it's important ours include the defaults too.
Dictator::add_state( 'site', WoocommerceSite::class );
Dictator::add_state( 'network', WoocommerceNetwork::class );
