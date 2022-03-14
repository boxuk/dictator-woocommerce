<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

use BoxUk\Dictator\Region\Region;
use BoxUk\Dictator\Utils;

final class SiteGeneralSettings extends Region
{
    use Util;
    use GeneralSettings;

    /**
     * Return our schema.
     *
     * @return array
     */
    public function getSchema(): array
    {
        return $this->generalSettingsSchema;
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
                case 'calc_taxes':
                case 'enable_coupons':
                case 'calc_discounts_sequentially':
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
            case 'specific_allowed_countries':
            case 'all_except_countries':
            case 'specific_ship_to_countries':
                return get_option(self::normalizeOption($name), []);
            case 'calc_taxes':
            case 'calc_discounts_sequentially':
                $yes_or_no = get_option(self::normalizeOption($name), 'no');

                return $yes_or_no === 'yes';
            case 'enable_coupons':
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
