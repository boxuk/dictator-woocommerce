<?php

declare(strict_types=1);

namespace BoxUk\DictatorWooCommerce\Region;

use BoxUk\Dictator\Region\CouldNotImposeRegionException;
use BoxUk\Dictator\Region\NetworkSites;

final class WoocommerceNetworkSites extends NetworkSites
{
    use Util;
    use GeneralSettings;
    use ProductSettings;
    use TaxSettings;
    use ShippingSettings;
    use AccountsSettings;
    use EmailSettings;
    use AdvancedSettings;

    /**
     * Return our schema.
     *
     * @return array
     */
    public function getSchema(): array
    {
        $parentSchema = parent::getSchema();
        // General.
        $parentSchema['_prototype']['_children']['woocommerce-general'] = [
            '_type' => $this->generalSettingsSchema['_type'],
            '_children' => $this->generalSettingsSchema['_children'],
        ];

        // Product.
        $parentSchema['_prototype']['_children']['woocommerce-product'] = [
            '_type' => $this->productSettingsSchema['_type'],
            '_children' => $this->productSettingsSchema['_children'],
        ];

        // Tax.
        $parentSchema['_prototype']['_children']['woocommerce-tax'] = [
            '_type' => $this->taxSettingsSchema['_type'],
            '_children' => $this->taxSettingsSchema['_children'],
        ];

        // Shipping.
        $parentSchema['_prototype']['_children']['woocommerce-shipping'] = [
            '_type' => $this->shippingSettingsSchema['_type'],
            '_children' => $this->shippingSettingsSchema['_children'],
        ];

        // Accounts.
        $parentSchema['_prototype']['_children']['woocommerce-accounts'] = [
            '_type' => $this->accountsSettingsSchema['_type'],
            '_children' => $this->accountsSettingsSchema['_children'],
        ];

        // Email.
        $parentSchema['_prototype']['_children']['woocommerce-email'] = [
            '_type' => $this->emailSettingsSchema['_type'],
            '_children' => $this->emailSettingsSchema['_children'],
        ];

        // Advanced.
        $parentSchema['_prototype']['_children']['woocommerce-advanced'] = [
            '_type' => $this->advancedSettingsSchema['_type'],
            '_children' => $this->advancedSettingsSchema['_children'],
        ];

        $this->schema = $parentSchema;

        return $this->schema;
    }

    /**
     * Impose some state data onto a region. Use parent unless an option has a woocommerce prefix.
     *
     * @param string $key Site slug.
     * @param array $value Site data.
     *
     * @throws CouldNotImposeRegionException If the region could not be imposed.
     */
    public function impose($key, $value): void
    {
        $customDomain = $value['custom_domain'] ?? '';
        $site_slug = $this->getSiteSlug(get_current_site(), $key, $customDomain);

        $site = $this->getSite($site_slug);
        if (! $site) {
            $site = $this->createSite($key, $value);
            if (is_wp_error($site)) {
                throw new CouldNotImposeRegionException($site->get_error_message());
            }
        }
        switch_to_blog($site->blog_id);
        foreach ($value as $option => $content) {
            if (strpos($option, 'woocommerce') !== 0) {
                parent::impose($key, [$option => $content]);
                continue;
            }

            switch ($option) {
                case 'woocommerce-general':
                    foreach ($content as $wooGeneralField => $wooGeneralValue) {
                        switch ($wooGeneralField) {
                            case 'calc_taxes':
                            case 'enable_coupons':
                            case 'calc_discounts_sequentially':
                                $wooGeneralValue = $wooGeneralValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooGeneralField), $wooGeneralValue);
                    }
                    break;
                case 'woocommerce-product':
                    foreach ($content as $wooProductField => $wooProductValue) {
                        switch ($wooProductField) {
                            case 'cart_redirect_after_add':
                            case 'enable_ajax_add_to_cart':
                            case 'enable_reviews':
                            case 'review_rating_verification_label':
                            case 'review_rating_verification_required':
                            case 'enable_review_rating':
                            case 'review_rating_required':
                            case 'manage_stock':
                            case 'notify_low_stock':
                            case 'notify_no_stock':
                            case 'hide_out_of_stock_items':
                            case 'downloads_require_login':
                            case 'downloads_grant_access_after_payment':
                            case 'downloads_add_hash_to_filename':
                                $wooProductValue = $wooProductValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooProductField), $wooProductValue);
                    }
                    break;
                case 'woocommerce-tax':
                    foreach ($content as $wooTaxField => $wooTaxValue) {
                        switch ($wooTaxField) {
                            case 'prices_include_tax':
                            case 'tax_round_at_subtotal':
                                $wooTaxValue = $wooTaxValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooTaxField), $wooTaxValue);
                    }
                    break;
                case 'woocommerce-shipping':
                    foreach ($content as $wooShippingField => $wooShippingValue) {
                        switch ($wooShippingField) {
                            case 'enable_shipping_calc':
                            case 'shipping_cost_requires_address':
                            case 'shipping_debug_mode':
                                $wooShippingValue = $wooShippingValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooShippingField), $wooShippingValue);
                    }
                    break;
                case 'woocommerce-accounts':
                    foreach ($content as $wooAccountsField => $wooAccountsValue) {
                        switch ($wooAccountsField) {
                            case 'enable_guest_checkout':
                            case 'enable_checkout_login_reminder':
                            case 'enable_signup_and_login_from_checkout':
                            case 'enable_myaccount_registration':
                            case 'registration_generate_username':
                            case 'registration_generate_password':
                            case 'erasure_request_removes_order_data':
                            case 'erasure_request_removes_download_data':
                            case 'allow_bulk_remove_personal_data':
                                $wooAccountsValue = $wooAccountsValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooAccountsField), $wooAccountsValue);
                    }
                    break;
                case 'woocommerce-email':
                    foreach ($content as $wooEmailField => $wooEmailValue) {
                        switch ($wooEmailField) {
                            case 'merchant_email_notifications':
                                $wooEmailValue = $wooEmailValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooEmailField), $wooEmailValue);
                    }
                    break;
                case 'woocommerce-advanced':
                    foreach ($content as $wooAdvField => $wooAdvValue) {
                        switch ($wooAdvField) {
                            case 'force_ssl_checkout':
                            case 'unforce_ssl_checkout':
                            case 'api_enabled':
                            case 'allow_tracking':
                            case 'show_marketplace_suggestions':
                                $wooAdvValue = $wooAdvValue === true ? 'yes' : 'no';
                                break;
                        }
                        update_option(self::normalizeOption($wooAdvField), $wooAdvValue);
                    }
                    break;
            }
        }
        restore_current_blog();
    }

    /**
     * Retrieves option name. This differs from the version in the trait as it switches to the relevant site first.
     *
     * @param string $name Option name.
     *
     * @return mixed
     */
    public function get(string $name)
    {
        $site_slug = $this->currentSchemaAttributeParents[0];
        $site = $this->getSite($site_slug);

        switch_to_blog($site->blog_id);
        switch ($name) {
            case 'specific_allowed_countries':
            case 'all_except_countries':
            case 'specific_ship_to_countries':
            case 'delete_inactive_accounts':
            case 'trash_pending_orders':
            case 'trash_failed_orders':
            case 'trash_cancelled_orders':
            case 'anonymize_completed_orders':
                $value = get_option(self::normalizeOption($name), []);
                break;
            case 'calc_taxes':
            case 'calc_discounts_sequentially':
            case 'cart_redirect_after_add':
            case 'review_rating_verification_required':
            case 'hide_out_of_stock_items':
            case 'downloads_require_login':
            case 'prices_include_tax':
            case 'tax_round_at_subtotal':
            case 'shipping_cost_requires_address':
            case 'shipping_debug_mode':
            case 'enable_checkout_login_reminder':
            case 'enable_signup_and_login_from_checkout':
            case 'enable_myaccount_registration':
            case 'erasure_request_removes_order_data':
            case 'erasure_request_removes_download_data':
            case 'allow_bulk_remove_personal_data':
            case 'merchant_email_notifications':
            case 'force_ssl_checkout':
            case 'unforce_ssl_checkout':
            case 'api_enabled':
            case 'allow_tracking':
                $yes_or_no = get_option(self::normalizeOption($name), 'no');
                $value = $yes_or_no === 'yes';
                break;
            case 'enable_coupons':
            case 'enable_ajax_add_to_cart':
            case 'enable_reviews':
            case 'review_rating_verification_label':
            case 'enable_review_rating':
            case 'review_rating_required':
            case 'manage_stock':
            case 'notify_low_stock':
            case 'notify_no_stock':
            case 'downloads_grant_access_after_payment':
            case 'downloads_add_hash_to_filename':
            case 'enable_shipping_calc':
            case 'enable_guest_checkout':
            case 'registration_generate_username':
            case 'registration_generate_password':
            case 'show_marketplace_suggestions':
                $yes_or_no = get_option(self::normalizeOption($name), 'yes');
                $value = $yes_or_no === 'yes';
                break;
            default:
                $value = get_option(self::normalizeOption($name));
                break;
        }

        restore_current_blog();

        return $value;
    }
}
