<?php
/**
 * Plugin Name: WooCommerce Payment Gateway Starter
 * Description: A starter architecture for integrating custom WooCommerce payment providers.
 * Version: 0.1.0
 * Author: Sang Huynh Xuan
 * License: GPL-2.0-or-later
 */

declare(strict_types=1);

namespace SangPortfolio;

if (! defined('ABSPATH')) {
    exit;
}

final class WoocommercePaymentGatewayStarterPlugin {
    public function __construct() {
        add_action('init', [$this, 'bootstrap']);
    }

    public function bootstrap(): void {
        do_action('sang_portfolio_woocommerce_payment_gateway_starter_ready');
    }
}

new WoocommercePaymentGatewayStarterPlugin();
