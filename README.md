# WooCommerce state for Dictator

## Installation

### WP-CLI package

`wp package install boxuk/dictator-woocommerce`

### Composer package

`composer req boxuk/dictator-woocommerce`

## Usage

Use in your dictator state yaml files as such:

```yaml
state: site
   # ...
woocommerce-general:
  store_address: 2 Some Street
  store_address_2:
  store_city: some town
  default_country: GB
  store_postcode: CF10 1XX
  allowed_countries: specific
  specific_allowed_countries: [GB, US]
# ...
woocommerce-advanced:
  cart_page_id: 10
  checkout_page_id: 20
  myaccount_page_id: 30
  terms_page_id: 40
  force_ssl_checkout: true
```

Or as part of a network:

```yaml
state: network
   # ...
sites:
  :
    title: Site one
    active_plugins:
        - woocommerce/woocommerce.php    
    # ...
    woocommerce-general:
      store_address: 2 Some Street
      store_address_2:
      store_city: some town
      default_country: GB
      store_postcode: CF10 1XX
      allowed_countries: specific
      specific_allowed_countries: [GB, US]
    # ...
    woocommerce-advanced:
        cart_page_id: 10
        checkout_page_id: 20
        myaccount_page_id: 30
        terms_page_id: 40
        force_ssl_checkout: true
```

## Supported settings

* `woocommerce-general`
    * `store_address`
    * `store_address_2`
    * `store_city`
    * `default_country`
    * `store_postcode`
    * `allowed_countries`
    * `specific_allowed_countries`
    * `ship_to_countries`
    * `specific_ship_to_countries`
    * `default_customer_address`
    * `calc_taxes`
    * `enable_coupons`
    * `calc_discounts_sequentially`
    * `currency`
    * `currency_pos`
    * `price_thousand_sep`
    * `price_decimal_sep`
    * `price_num_decimals`
* `woocommerce-product`
    * `shop_page_id`
    * `cart_redirect_after_add`
    * `enable_ajax_add_to_cart`
    * `placeholder_image`
    * `weight_unit`
    * `dimension_unit`
    * `enable_reviews`
    * `review_rating_verification_label`
    * `review_rating_verification_required`
    * `enable_review_rating`
    * `review_rating_required`
    * `manage_stock`
    * `hold_stock_minutes`
    * `notify_low_stock`
    * `notify_no_stock`
    * `stock_email_recipient`
    * `notify_low_stock_amount`
    * `notify_no_stock_amount`
    * `hide_out_of_stock_items`
    * `stock_format`
    * `file_download_method`
    * `downloads_require_login`
    * `downloads_grant_access_after_payment`
    * `downloads_add_hash_to_filename`
* `woocommerce-tax`
    * `prices_include_tax`
    * `tax_based_on`
    * `shipping_tax_class`
    * `tax_round_at_subtotal`
    * `tax_classes`
    * `tax_display_shop`
    * `tax_display_cart`
    * `price_display_suffix`
    * `tax_total_display`
* `woocommerce-shipping`
    * `enable_shipping_calc`
    * `shipping_cost_requires_address`
    * `ship_to_destination`
    * `shipping_debug_mode`
* `woocommerce-accounts`
    * `enable_guest_checkout`
    * `enable_checkout_login_reminder`
    * `enable_signup_and_login_from_checkout`
    * `enable_myaccount_registration`
    * `registration_generate_username`
    * `registration_generate_password`
    * `erasure_request_removes_order_data`
    * `erasure_request_removes_download_data`
    * `allow_bulk_remove_personal_data`
    * `registration_privacy_policy_text`
    * `checkout_privacy_policy_text`
    * `delete_inactive_accounts`
    * `trash_pending_orders`
    * `trash_failed_orders`
    * `trash_cancelled_orders`
    * `anonymize_completed_orders`
* `woocommerce-email`
    * `email_from_name`
    * `email_from_address`
    * `email_header_image`
    * `email_footer_text`
    * `email_base_color`
    * `email_background_color`
    * `email_body_background_color`
    * `email_text_color`
    * `merchant_email_notifications`
* `woocommerce-advanced`
    * `cart_page_id`
    * `checkout_page_id`
    * `myaccount_page_id`
    * `terms_page_id`
    * `force_ssl_checkout`
    * `unforce_ssl_checkout`
    * `checkout_pay_endpoint`
    * `checkout_order_received_endpoint`
    * `myaccount_add_payment_method_endpoint`
    * `myaccount_delete_payment_method_endpoint`
    * `myaccount_set_default_payment_method_endpoint`
    * `myaccount_orders_endpoint`
    * `myaccount_view_order_endpoint`
    * `myaccount_downloads_endpoint`
    * `myaccount_edit_account_endpoint`
    * `myaccount_edit_address_endpoint`
    * `myaccount_payment_methods_endpoint`
    * `myaccount_lost_password_endpoint`
    * `logout_endpoint`
    * `api_enabled`
    * `allow_tracking`
    * `show_marketplace_suggestions`

## Unsupported settings

Some settings aren't supported, and will need to be configured by other means. These are listed below:

* Tax rates
* Shipping zones
* Payment methods
* Email notifications
* REST API
* Webhooks
