<?php
declare(strict_types=1);
namespace SangPortfolio\WoocommercePaymentGatewayStarter;
if (! defined('ABSPATH')) { exit; }
final class Feature {
    private const OPTION = 'woocommerce_payment_gateway_starter_enabled';
    private const SLUG = 'woocommerce-payment-gateway-starter';
    private const TITLE = 'WooCommerce Payment Gateway Starter';
    public function register(): void {
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'registerPage']);
        if (Support::enabled(self::OPTION)) { $this->registerFeature(); }
    }
    public function registerSettings(): void { register_setting(self::SLUG, self::OPTION, ['sanitize_callback' => static fn($value): string => empty($value) ? '0' : '1']); }
    public function registerPage(): void { add_options_page(self::TITLE, self::TITLE, 'manage_options', self::SLUG, [$this, 'renderPage']); }
    public function renderPage(): void { if (! current_user_can('manage_options')) { return; } echo '<div class="wrap"><h1>' . esc_html(self::TITLE) . '</h1><form method="post" action="options.php">'; settings_fields(self::SLUG); echo '<label><input type="checkbox" name="' . esc_attr(self::OPTION) . '" value="1" ' . checked(Support::enabled(self::OPTION), true, false) . '> ' . esc_html__('Enable feature', 'sang-portfolio') . '</label>'; submit_button(); echo '</form></div>'; }
    private function registerFeature(): void { add_filter('woocommerce_gateway_title', [$this, 'clarifyGatewayTitle'], 10, 2); }
    public function clarifyGatewayTitle(string $title, string $gateway_id): string { if ('bacs' === $gateway_id) { return $title . ' — ' . __('secure bank transfer', 'sang-portfolio'); } return $title; }
}
