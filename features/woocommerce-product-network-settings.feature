Feature: WooCommerce Network Product Settings Region

  Scenario: Impose Product WooCommerce Network Settings
    Given a WP multisite install
    And a woocommerce-network.yml file:
      """
      state: network
      sites:
        siteone:
          title: Site one
          active_plugins:
            - woocommerce/woocommerce.php
          woocommerce-product:
            shop_page_id: 1
            cart_redirect_after_add: false
            enable_ajax_add_to_cart: true
            placeholder_image: foo.jpg
            weight_unit: kg
            dimension_unit: cm
            enable_reviews: true
            review_rating_verification_label: false
            review_rating_verification_required: true
            enable_review_rating: true
            review_rating_required: false
            manage_stock: true
            hold_stock_minutes: 5
            notify_low_stock: true
            notify_no_stock: true
            stock_email_recipient: example@example.com
            notify_low_stock_amount: 5
            notify_no_stock_amount: 0
            hide_out_of_stock_items: false
            stock_format:
            file_download_method: redirect
            downloads_require_login: true
            downloads_grant_access_after_payment: true
            downloads_add_hash_to_filename: true
      """

    When I run `wp dictator impose woocommerce-network.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce-network.yml`
    Then STDOUT should be empty

    When I run `wp --url=example.com/siteone option get woocommerce_shop_page_id`
    Then STDOUT should be:
      """
      1
      """

    When I run `wp --url=example.com/siteone option get woocommerce_cart_redirect_after_add`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_placeholder_image`
    Then STDOUT should be:
      """
      foo.jpg
      """

    When I run `wp --url=example.com/siteone option get woocommerce_weight_unit`
    Then STDOUT should be:
      """
      kg
      """

    When I run `wp --url=example.com/siteone option get woocommerce_dimension_unit`
    Then STDOUT should be:
      """
      cm
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_reviews`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_review_rating_verification_label`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_review_rating_verification_required`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_review_rating`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_review_rating_required`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_manage_stock`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_hold_stock_minutes`
    Then STDOUT should be:
      """
      5
      """

    When I run `wp --url=example.com/siteone option get woocommerce_notify_low_stock`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_notify_no_stock`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_stock_email_recipient`
    Then STDOUT should be:
      """
      example@example.com
      """

    When I run `wp --url=example.com/siteone option get woocommerce_notify_low_stock_amount`
    Then STDOUT should be:
      """
      5
      """

    When I run `wp --url=example.com/siteone option get woocommerce_notify_no_stock_amount`
    Then STDOUT should be:
      """
      0
      """

    When I run `wp --url=example.com/siteone option get woocommerce_hide_out_of_stock_items`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_stock_format`
    Then STDOUT should be:
      """
      """

    When I run `wp --url=example.com/siteone option get woocommerce_file_download_method`
    Then STDOUT should be:
      """
      redirect
      """

    When I run `wp --url=example.com/siteone option get woocommerce_downloads_require_login`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_downloads_grant_access_after_payment`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_downloads_add_hash_to_filename`
    Then STDOUT should be:
      """
      yes
      """
