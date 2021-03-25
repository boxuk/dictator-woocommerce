<?php

namespace BoxUk\DictatorWooCommerce\State;

use BoxUk\DictatorWooCommerce\Region\WoocommerceNetworkSites;
use Dictator\States\Network;

class WoocommerceNetwork extends Network {
	/**
	 * Specify required regions for the state.
	 *
	 * @var string[]
	 */
	protected $woocommerce_regions = array(
		'sites' => WoocommerceNetworkSites::class,
	);

	/**
	 * Rather than dictate a woocommerce state, this merges with the site state to ensure we can configure woocommerce beneath site.
	 *
	 * @param null $yaml Yaml settings that is passed to the parent.
	 */
	public function __construct( $yaml = null ) {
		parent::__construct( $yaml );

		$this->regions = array_merge(
			$this->regions,
			$this->woocommerce_regions
		);
	}
}
