# WooCommerce state for Dictator

## Installation

`composer req boxuk/dictator-woocommerce`

## Usage

Use in your dictator state yaml files as such:

```yaml
state: site
   # ...
woocommerce:
  store_address: 2 Some Street
  store_address_2:
  store_city: some town
  default_country: GB
  store_postcode: G1 3SJ
  allowed_countries: specific
  specific_allowed_countries: [GB, US]
```
