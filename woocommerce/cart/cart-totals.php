<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2 class="cart_totals_heading"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>
<div class="cart-totals-border">
	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>
		<tr class="cart-Levering">
			<th colspan="2" class="cart-Levering-content"><?php esc_html_e( 'Levering', 'woocommerce' ); ?></th>
		</tr>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>
    <div><p><img class="all_payment" src="https://woocommerce-532574-1802103.cloudwaysapps.com/wp-contents/uploads/2021/03/all_payment_logo.png"></p></div>
</div>    
<div class="total-bottom">
	<p class="anmeldelser">
		<?php for($i = 0; $i <5 ; $i++){?>
		<svg width="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
		<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
		<g><path d="M797.5,994.5L496.7,758.8L191.8,988.7l119-375.5L10,377.5l374.3,3.6L503.2,5.5l112.5,377.7l374.3,3.6L685.1,616.7L797.5,994.5z"/></g>
		</svg> 
		<?php } ?>
		<span>  861 anmeldelser pa  </span>
	</p>
	<p class="Trust">
		<svg width="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
		<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
		<g><path d="M797.5,994.5L496.7,758.8L191.8,988.7l119-375.5L10,377.5l374.3,3.6L503.2,5.5l112.5,377.7l374.3,3.6L685.1,616.7L797.5,994.5z"/></g>
		</svg> 
		<span>Trust Pilot</span>
	</p>
</div>
<div class="actions">
	<table class="coupon coupon-extra">
		<tr>			
			<td class="delivary delivary-extra">
				<img src="https://woocommerce-532574-1802103.cloudwaysapps.com/wp-contents/uploads/2021/03/truck-7.png">
				<p>1-5 dages fragt</p>
			</td>
			<td class="webshop webshop-extra">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
					<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
					<g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path d="M4070.8,4442.4c-505.3-308.9-914.9-565.2-910.1-570c4.8-2.4,440.7-270.6,969.9-596.3l960.3-591.5l926.8,567.6c732.9,450.2,917.2,574.8,893.3,596.3C6860.9,3896.4,5033.5,5010,5009.6,5010C4997.6,5007.6,4576.1,4753.7,4070.8,4442.4z"/><path d="M1754.9,3019.8c-512.5-316.1-941.2-584.4-950.8-591.5c-16.8-16.8,1880-1192.7,1913.5-1187.9c12,2.4,447.8,265.8,969.9,586.8c804.7,491,943.6,586.8,910.1,608.3c-115,76.6-1848.9,1140-1877.6,1149.6C2703.3,3589.8,2269.8,3336,1754.9,3019.8z"/><path d="M6513.6,2957.6c-742.4-455-912.5-570-886.1-593.9c52.7-50.3,1729.1-1072.9,1757.9-1072.9c43.1,0,1851.3,1120.8,1834.5,1137.6c-23.9,21.6-1736.3,1075.3-1765,1084.9C7442.8,3518,7018.9,3268.9,6513.6,2957.6z"/><path d="M4176.2,1523c-526.9-320.9-958-586.8-962.8-591.5c-4.8-4.8,1307.6-819.1,1712.4-1063.4l88.6-52.7L5955.6,395c517.3,318.5,941.2,591.5,941.2,603.5c0,16.8-1451.3,931.6-1729.1,1089.7C5138.9,2102.6,4873.1,1951.7,4176.2,1523z"/><path d="M521.5-96v-2093.1l969.9-591.6c534.1-325.7,974.7-591.5,981.9-591.5c7.2,0,12,941.2,12,2090.8l-2.4,2088.4l-864.6,526.9c-476.6,289.8-917.3,558-981.9,593.9l-115,69.5V-96z"/><path d="M8530.1,1422.4l-931.6-570l-7.2-2088.4c-2.4-1149.6,2.4-2088.4,9.6-2088.4c9.6,0,435.9,256.3,946,567.6l931.6,567.6V-98.4c0,1149.6-2.4,2090.8-7.2,2090.8C9466.5,1992.4,9045,1736.1,8530.1,1422.4z"/><path d="M6142.4-33.7l-926.8-565.2v-2095.5V-4790l55.1,33.5c28.7,19.2,447.9,275.4,934,570l878.9,536.5v2090.7c0,1149.6-2.4,2090.8-7.2,2090.8C7074,531.5,6652.5,277.6,6142.4-33.7z"/><path d="M2964.3-1585.6v-2095.5l893.3-541.3c488.6-299.4,898.1-548.4,910.1-555.6c9.6-4.8,16.8,931.6,16.8,2083.6v2093.2l-819.1,500.5c-450.2,275.4-859.8,524.5-910.1,555.6l-91,55.1V-1585.6z"/></g></g>
				</svg>
				<p>dansk webshop</p>
			</td>
		</tr>
	</table>
</div>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>