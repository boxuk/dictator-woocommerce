Feature: WooCommerce Network Accounts Settings Region

  Scenario: Impose Accounts WooCommerce Network Settings
    Given a WP multisite install
    And a woocommerce-network.yml file:
      """
      state: network
      sites:
        siteone:
          title: Site one
          active_plugins:
            - woocommerce/woocommerce.php
          woocommerce-accounts:
            enable_guest_checkout: true
            enable_checkout_login_reminder: false
            enable_signup_and_login_from_checkout: true
            enable_myaccount_registration: true
            registration_generate_username: true
            registration_generate_password: true
            erasure_request_removes_order_data: true
            erasure_request_removes_download_data: true
            allow_bulk_remove_personal_data: true
            registration_privacy_policy_text: We use cookies
            checkout_privacy_policy_text: We use cookies
            delete_inactive_accounts:
              number: 30
              unit: days
            trash_pending_orders:
              number: 5
              unit: days
            trash_failed_orders:
              number: 10
              unit: days
            trash_cancelled_orders:
              number: 1
              unit: weeks
            anonymize_completed_orders:
              number: 1
              unit: months
      """

    When I run `wp dictator impose woocommerce-network.yml`
    Then STDOUT should not be empty

    When I run `wp dictator compare woocommerce-network.yml`
    Then STDOUT should be empty

    When I run `wp --url=example.com/siteone option get woocommerce_enable_guest_checkout`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_checkout_login_reminder`
    Then STDOUT should be:
      """
      no
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_signup_and_login_from_checkout`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_enable_myaccount_registration`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_registration_generate_username`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_registration_generate_password`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_erasure_request_removes_order_data`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_erasure_request_removes_download_data`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_allow_bulk_remove_personal_data`
    Then STDOUT should be:
      """
      yes
      """

    When I run `wp --url=example.com/siteone option get woocommerce_registration_privacy_policy_text`
    Then STDOUT should be:
      """
      We use cookies
      """

    When I run `wp --url=example.com/siteone option get woocommerce_checkout_privacy_policy_text`
    Then STDOUT should be:
      """
      We use cookies
      """

    When I run `wp --url=example.com/siteone option get woocommerce_delete_inactive_accounts --format=json`
    Then STDOUT should be:
      """
      {"number":30,"unit":"days"}
      """

    When I run `wp --url=example.com/siteone option get woocommerce_trash_pending_orders --format=json`
    Then STDOUT should be:
      """
      {"number":5,"unit":"days"}
      """

    When I run `wp --url=example.com/siteone option get woocommerce_trash_failed_orders --format=json`
    Then STDOUT should be:
      """
      {"number":10,"unit":"days"}
      """

    When I run `wp --url=example.com/siteone option get woocommerce_trash_cancelled_orders --format=json`
    Then STDOUT should be:
      """
      {"number":1,"unit":"weeks"}
      """

    When I run `wp --url=example.com/siteone option get woocommerce_anonymize_completed_orders --format=json`
    Then STDOUT should be:
      """
      {"number":1,"unit":"months"}
      """
