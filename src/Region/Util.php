<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

trait Util
{
    /**
     * Normalizes option by adding WooCommerce prefix if not present.
     *
     * @param string $option Option name.
     *
     * @return string
     */
    public static function normalizeOption(string $option): string
    {
        if (strpos($option, 'woocommerce_') !== 0) {
            $option = 'woocommerce_' . $option;
        }

        return $option;
    }
}
