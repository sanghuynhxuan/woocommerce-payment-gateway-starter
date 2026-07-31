<?php
/**
 * Plugin Name: WooCommerce Payment Gateway Starter
 * Description: A checkout gateway-title customization hook suitable for payment integration workflows.
 * Version: 1.0.0
 * Author: Sang Huynh Xuan
 * License: GPL-2.0-or-later
 */

declare(strict_types=1);

if (! defined('ABSPATH')) { exit; }

require_once __DIR__ . '/includes/Support.php';
require_once __DIR__ . '/includes/Feature.php';

add_action('plugins_loaded', static function (): void {
    (new \SangPortfolio\WoocommercePaymentGatewayStarter\Feature())->register();
});
