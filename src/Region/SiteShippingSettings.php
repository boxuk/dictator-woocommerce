<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

use BoxUk\Dictator\Region\Region;
use BoxUk\Dictator\Utils;

final class SiteShippingSettings extends Region
{
    use Util;
    use ShippingSettings;

    /**
     * Return our schema.
     *
     * @return array
     */
    public function getSchema(): array
    {
        return $this->shippingSettingsSchema;
    }

    /**
     * Sets data.
     *
     * @param null $_ Unused.
     * @param mixed $options Options to impose.
     */
    public function impose($_, $options): void
    {
        foreach ($options as $option => $content) {
            switch ($option) {
                case 'enable_shipping_calc':
                case 'shipping_cost_requires_address':
                case 'shipping_debug_mode':
                    $content = $content === true ? 'yes' : 'no';
            }
            update_option(self::normalizeOption($option), $content);
        }
    }

    /**
     * Retrieves option name.
     *
     * @param string $name Option name.
     *
     * @return mixed
     */
    public function get(string $name)
    {
        switch ($name) {
            case 'shipping_cost_requires_address':
            case 'shipping_debug_mode':
                $yes_or_no = get_option(self::normalizeOption($name), 'no');

                return $yes_or_no === 'yes';
            case 'enable_shipping_calc':
                $yes_or_no = get_option(self::normalizeOption($name), 'yes');

                return $yes_or_no === 'yes';
        }

        return get_option(self::normalizeOption($name));
    }

    /**
     * Calculates diff.
     *
     * @return array
     */
    public function getDifferences(): array
    {
        $result = [
            'dictated' => $this->getImposedData(),
            'current' => $this->getCurrentData(),
        ];

        if (Utils::arrayDiffRecursive($result['dictated'], $result['current'])) {
            return ['option' => $result];
        }

        return [];
    }
}
