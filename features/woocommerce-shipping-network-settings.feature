Feature: WooCommerce Network Shipping Settings Region

  Scenario: Impose Shipping WooCommerce Network Settings
    Given a WP multisite install
    And a woocommerce-network.yml file:
      """
      state: network
      sites:
        siteone:
          title: Site one
          active_plugins:
            - woocommerce/woocommerce.php
          woocommerce-shipping:
            enable_shipping_calc: true
            shipping_cost_requires_address: true
            ship_to_destination: shipping
            shipping_debug_mode: false
      """

    When I run `wp dictator impose woocommerce-network.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce-network.yml`
    Then STDOUT should be empty

    When I run `wp --url=example.com/siteone option get woocommerce_enable_shipping_calc`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_shipping_cost_requires_address`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_ship_to_destination`
    Then STDOUT should be:
      """
      shipping
      """

    When I run `wp --url=example.com/siteone option get woocommerce_shipping_debug_mode`
    Then STDOUT should be:
      """
      no
      """
