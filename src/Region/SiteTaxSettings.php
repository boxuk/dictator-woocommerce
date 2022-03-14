<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

use BoxUk\Dictator\Region\Region;
use BoxUk\Dictator\Utils;

final class SiteTaxSettings extends Region
{
    use Util;
    use TaxSettings;

    /**
     * Return our schema.
     *
     * @return array
     */
    public function getSchema(): array
    {
        return $this->taxSettingsSchema;
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
                case 'prices_include_tax':
                case 'tax_round_at_subtotal':
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
            case 'prices_include_tax':
            case 'tax_round_at_subtotal':
                $yes_or_no = get_option(self::normalizeOption($name), 'no');

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
