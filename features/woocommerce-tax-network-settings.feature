Feature: WooCommerce Network Tax Settings Region

  Scenario: Impose Tax WooCommerce Network Settings
    Given a WP multisite install
    And a woocommerce-network.yml file:
      """
      state: network
      sites:
        siteone:
          title: Site one
          active_plugins:
            - woocommerce/woocommerce.php
          woocommerce-tax:
            prices_include_tax: true
            tax_based_on: shipping
            shipping_tax_class: inherit
            tax_round_at_subtotal: false
            tax_classes: |
              Tax A
              Tax B
            tax_display_shop: incl
            tax_display_cart: incl
            price_display_suffix: incl. VAT
            tax_total_display: single
      """

    When I run `wp dictator impose woocommerce-network.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce-network.yml`
    Then STDOUT should be empty

    When I run `wp --url=example.com/siteone option get woocommerce_prices_include_tax`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_based_on`
    Then STDOUT should be:
      """
      shipping
      """

    When I run `wp --url=example.com/siteone option get woocommerce_shipping_tax_class`
    Then STDOUT should be:
      """
      inherit
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_round_at_subtotal`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_classes`
    Then STDOUT should be:
      """
      Tax A
      Tax B
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_display_shop`
    Then STDOUT should be:
      """
      incl
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_display_cart`
    Then STDOUT should be:
      """
      incl
      """

    When I run `wp --url=example.com/siteone option get woocommerce_price_display_suffix`
    Then STDOUT should be:
      """
      incl. VAT
      """

    When I run `wp --url=example.com/siteone option get woocommerce_tax_total_display`
    Then STDOUT should be:
      """
      single
      """
