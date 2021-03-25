Feature: WooCommerce Site Email Settings Region

  Scenario: Impose Email WooCommerce Site Settings
    Given a WP install
    And a woocommerce.yml file:
      """
      state: site
      woocommerce-email:
        email_from_name: Admin
        email_from_address: example@example.com
        email_header_image: foo.jpg
        email_footer_text: Thanks for your custom
        email_base_color: '#000000'
        email_background_color: '#FFF'
        email_body_background_color: '#FFF'
        email_text_color: '#000'
        merchant_email_notifications: false
      """

    When I run `wp dictator impose woocommerce.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce.yml`
    Then STDOUT should be empty

    When I run `wp option get woocommerce_email_from_name`
    Then STDOUT should be:
      """
      Admin
      """

    When I run `wp option get woocommerce_email_from_address`
    Then STDOUT should be:
      """
      example@example.com
      """

    When I run `wp option get woocommerce_email_header_image`
    Then STDOUT should be:
      """
      foo.jpg
      """

    When I run `wp option get woocommerce_email_footer_text`
    Then STDOUT should be:
      """
      Thanks for your custom
      """

    When I run `wp option get woocommerce_email_base_color`
    Then STDOUT should be:
      """
      #000000
      """

    When I run `wp option get woocommerce_email_background_color`
    Then STDOUT should be:
      """
      #FFF
      """

    When I run `wp option get woocommerce_email_body_background_color`
    Then STDOUT should be:
      """
      #FFF
      """

    When I run `wp option get woocommerce_email_text_color`
    Then STDOUT should be:
      """
      #000
      """

    When I run `wp option get woocommerce_merchant_email_notifications`
    Then STDOUT should be:
      """
      no
      """
