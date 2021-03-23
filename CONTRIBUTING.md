# Contribute

Running and writing tests
-------------------------

Dictator WooCommerce uses functional tests, implemented using [Behat](http://behat.org) and leveraging WP-CLI's testing framework. They are located in the `features/` directory.

Before running the functional tests, you'll need to provision the testing environment. 

First make sure you have run composer with dev dependencies:

`composer install`

Then you'll need to export the following vars (update the values accordingly):

`export WP_CLI_TEST_DBROOTUSER=root`
`export WP_CLI_TEST_DBROOTPASS=root`
`export WP_CLI_TEST_DBUSER=wp_cli_test`
`export WP_CLI_TEST_DBPASS=password1`
`export WP_CLI_TEST_DBHOST=localhost`

Finally...
----------

Thanks! Hacking on Dictator should be fun. If you find any of this hard to figure
out, let us know so we can improve our process or documentation!
