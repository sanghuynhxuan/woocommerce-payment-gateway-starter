<?php
if (! defined('WP_UNINSTALL_PLUGIN')) { exit; }
delete_option('woocommerce_payment_gateway_starter_enabled');
