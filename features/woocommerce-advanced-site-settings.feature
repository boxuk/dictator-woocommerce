Feature: WooCommerce Site Advanced Settings Region

  Scenario: Impose Advanced WooCommerce Site Settings
    Given a WP install
    And a woocommerce.yml file:
      """
      state: site
      woocommerce-advanced:
        cart_page_id: 1
        checkout_page_id: 1
        myaccount_page_id: 1
        terms_page_id: 1
        force_ssl_checkout: true
        unforce_ssl_checkout: false
        checkout_pay_endpoint: order-pay
        checkout_order_received_endpoint: order-received
        myaccount_add_payment_method_endpoint: add-payment-method
        myaccount_delete_payment_method_endpoint: delete-payment-method
        myaccount_set_default_payment_method_endpoint: set-default-payment-method
        myaccount_orders_endpoint: orders
        myaccount_view_order_endpoint: view-order
        myaccount_downloads_endpoint: downloads
        myaccount_edit_account_endpoint: edit-account
        myaccount_edit_address_endpoint: edit-address
        myaccount_payment_methods_endpoint: payment-methods
        myaccount_lost_password_endpoint: lost-password
        logout_endpoint: customer-logout
        api_enabled: false
        allow_tracking: false
        show_marketplace_suggestions: false
      """

    When I run `wp dictator impose woocommerce.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce.yml`
    Then STDOUT should be empty

    When I run `wp option get woocommerce_cart_page_id`
    Then STDOUT should be:
      """
      1
      """

    When I run `wp option get woocommerce_checkout_page_id`
    Then STDOUT should be:
      """
      1
      """

    When I run `wp option get woocommerce_myaccount_page_id`
    Then STDOUT should be:
      """
      1
      """

    When I run `wp option get woocommerce_terms_page_id`
    Then STDOUT should be:
      """
      1
      """

    When I run `wp option get woocommerce_force_ssl_checkout`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp option get woocommerce_unforce_ssl_checkout`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp option get woocommerce_checkout_pay_endpoint`
    Then STDOUT should be:
      """
      order-pay
      """

    When I run `wp option get woocommerce_checkout_order_received_endpoint`
    Then STDOUT should be:
      """
      order-received
      """

    When I run `wp option get woocommerce_myaccount_add_payment_method_endpoint`
    Then STDOUT should be:
      """
      add-payment-method
      """

    When I run `wp option get woocommerce_myaccount_delete_payment_method_endpoint`
    Then STDOUT should be:
      """
      delete-payment-method
      """

    When I run `wp option get woocommerce_myaccount_set_default_payment_method_endpoint`
    Then STDOUT should be:
      """
      set-default-payment-method
      """

    When I run `wp option get woocommerce_myaccount_orders_endpoint`
    Then STDOUT should be:
      """
      orders
      """

    When I run `wp option get woocommerce_myaccount_view_order_endpoint`
    Then STDOUT should be:
      """
      view-order
      """

    When I run `wp option get woocommerce_myaccount_downloads_endpoint`
    Then STDOUT should be:
      """
      downloads
      """

    When I run `wp option get woocommerce_myaccount_edit_account_endpoint`
    Then STDOUT should be:
      """
      edit-account
      """

    When I run `wp option get woocommerce_myaccount_edit_address_endpoint`
    Then STDOUT should be:
      """
      edit-address
      """

    When I run `wp option get woocommerce_myaccount_payment_methods_endpoint`
    Then STDOUT should be:
      """
      payment-methods
      """

    When I run `wp option get woocommerce_myaccount_lost_password_endpoint`
    Then STDOUT should be:
      """
      lost-password
      """

    When I run `wp option get woocommerce_logout_endpoint`
    Then STDOUT should be:
      """
      customer-logout
      """

    When I run `wp option get woocommerce_api_enabled`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp option get woocommerce_allow_tracking`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp option get woocommerce_show_marketplace_suggestions`
    Then STDOUT should be:
      """
      no
      """
