<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

use BoxUk\Dictator\Region\Region;
use BoxUk\Dictator\Utils;

final class SiteAdvancedSettings extends Region
{
    use Util;
    use AdvancedSettings;

    /**
     * Return our schema.
     *
     * @return array
     */
    public function getSchema(): array
    {
        return $this->advancedSettingsSchema;
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
                case 'force_ssl_checkout':
                case 'unforce_ssl_checkout':
                case 'api_enabled':
                case 'allow_tracking':
                case 'show_marketplace_suggestions':
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
     * @return mixed|void
     */
    public function get(string $name)
    {
        switch ($name) {
            case 'force_ssl_checkout':
            case 'unforce_ssl_checkout':
            case 'api_enabled':
            case 'allow_tracking':
                $yes_or_no = get_option(self::normalizeOption($name), 'no');

                return $yes_or_no === 'yes';
            case 'show_marketplace_suggestions':
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
