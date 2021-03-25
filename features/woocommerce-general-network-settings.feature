Feature: WooCommerce Network General Settings Region

  Scenario: Impose General WooCommerce Network Settings
    Given a WP multisite install
    And a woocommerce-network.yml file:
      """
      state: network
      sites:
        siteone:
          title: Site one
          active_plugins:
            - woocommerce/woocommerce.php
          woocommerce-general:
            store_address: 2 Some Street
            store_address_2:
            store_city: some town
            default_country: GB
            store_postcode: CF10 1XX
            allowed_countries: specific
            specific_allowed_countries:
              - GB
              - US
            ship_to_countries: specific
            specific_ship_to_countries:
              - GB
              - US
            default_customer_address: base
            calc_taxes: true
            enable_coupons: false
            calc_discounts_sequentially: true
            currency: GBP
            currency_pos: left
            price_thousand_sep: ,
            price_decimal_sep: .
            price_num_decimals: 2
      """

    When I run `wp dictator impose woocommerce-network.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce-network.yml`
    Then STDOUT should be empty

    When I run `wp --url=example.com/siteone option get woocommerce_store_address`
    Then STDOUT should be:
      """
      2 Some Street
      """

    When I run `wp --url=example.com/siteone option get woocommerce_store_address_2`
    Then STDOUT should be:
      """
      """

    When I run `wp --url=example.com/siteone option get woocommerce_store_city`
    Then STDOUT should be:
      """
      some town
      """

    When I run `wp --url=example.com/siteone option get woocommerce_default_country`
    Then STDOUT should be:
      """
      GB
      """

    When I run `wp --url=example.com/siteone option get woocommerce_store_postcode`
    Then STDOUT should be:
      """
      CF10 1XX
      """

    When I run `wp --url=example.com/siteone option get woocommerce_allowed_countries`
    Then STDOUT should be:
      """
      specific
      """

    When I run `wp --url=example.com/siteone option get woocommerce_specific_allowed_countries --format=json`
    Then STDOUT should be:
      """
      ["GB","US"]
      """

    When I run `wp --url=example.com/siteone option get woocommerce_ship_to_countries`
    Then STDOUT should be:
      """
      specific
      """

    When I run `wp --url=example.com/siteone option get woocommerce_specific_ship_to_countries --format=json`
    Then STDOUT should be:
      """
      ["GB","US"]
      """

    When I run `wp --url=example.com/siteone option get woocommerce_default_customer_address`
    Then STDOUT should be:
      """
      base
      """

    When I run `wp --url=example.com/siteone option get woocommerce_calc_taxes`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_coupons`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_calc_discounts_sequentially`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_currency`
    Then STDOUT should be:
      """
      GBP
      """

    When I run `wp --url=example.com/siteone option get woocommerce_currency_pos`
    Then STDOUT should be:
      """
      left
      """

    When I run `wp --url=example.com/siteone option get woocommerce_price_thousand_sep`
    Then STDOUT should be:
      """
      ,
      """

    When I run `wp --url=example.com/siteone option get woocommerce_price_decimal_sep`
    Then STDOUT should be:
      """
      .
      """

    When I run `wp --url=example.com/siteone option get woocommerce_price_num_decimals`
    Then STDOUT should be:
      """
      2
      """
