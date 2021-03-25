Feature: WooCommerce Site Shipping Settings Region

  Scenario: Impose Shipping WooCommerce Site Settings
    Given a WP install
    And a woocommerce.yml file:
      """
      state: site
      woocommerce-shipping:
        enable_shipping_calc: true
        shipping_cost_requires_address: true
        ship_to_destination: shipping
        shipping_debug_mode: false
      """

    When I run `wp dictator impose woocommerce.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce.yml`
    Then STDOUT should be empty

    When I run `wp option get woocommerce_enable_shipping_calc`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp option get woocommerce_shipping_cost_requires_address`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp option get woocommerce_ship_to_destination`
    Then STDOUT should be:
      """
      shipping
      """

    When I run `wp option get woocommerce_shipping_debug_mode`
    Then STDOUT should be:
      """
      no
      """
