<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<p class="cart-heading"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 318.76 181.92" style="enable-background:new 0 0 318.76 181.92;" xml:space="preserve">
<style type="text/css">
	.st0{fill:none;}
	.st3{fill:#FFFFFF;}
</style>
<polygon class="st0" points="604.6,-142.81 602.14,-142.81 602.14,-139.11 607.92,-139.11 "/>
<g>
	<path class="st3" d="M310.19,109.88c0-11.57-9.38-20.85-20.85-20.85h-1.04l-44-49h-30.24V4.89H61.43v20.02H8.57v16.47h52.86v23.77
		H25.67v16.37h35.76v23.88H38.7v16.37h22.73v20.12h23.88c-0.73,2.4-1.25,5-1.25,7.72c0,15.12,12.3,27.42,27.52,27.42
		c15.12,0,27.52-12.3,27.52-27.42c0-2.71-0.52-5.32-1.25-7.72h77.67c-0.73,2.4-1.15,5-1.15,7.72c0,15.12,12.3,27.42,27.42,27.42
		c15.22,0,27.52-12.3,27.52-27.42c0-2.71-0.52-5.32-1.25-7.72h42.12V109.88z M111.58,167.43c-9.9,0-17.83-8.03-17.83-17.83
		c0-2.81,0.63-5.42,1.77-7.72c2.92-6.05,8.97-10.11,16.06-10.11c6.99,0,13.14,4.07,15.95,10.11c1.15,2.29,1.88,4.9,1.88,7.72
		C129.41,159.4,121.38,167.43,111.58,167.43z M241.8,167.43c-9.8,0-17.83-8.03-17.83-17.83c0-2.81,0.73-5.42,1.88-7.72
		c2.82-6.05,8.86-10.11,15.95-10.11s13.14,4.07,16.06,10.11c1.15,2.29,1.77,4.9,1.77,7.72C259.63,159.4,251.7,167.43,241.8,167.43z
		 M214.07,89.03V50.45h25.65l34.61,38.58H214.07z"/>
</g>
</svg> <span>Gratis fragt ved køb over 1499 kr.</span></p>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                <?php do_action('woocommerce_checkout_before_order_review'); ?>
                <div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>
			</div>
 
			<div class="col-2 checkout-order-review">
				<?php do_action('woocommerce_checkout_before_order_review_heading' ); ?>
                <h3 id="order_review_heading">
                    <?php esc_html_e( 'Your order', 'woocommerce' ); ?>
                </h3>
    			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
    <div id="order_review" class="woocommerce-checkout-review-order woocommerce-checkout-review-order-extra">
        <?php do_action('woocommerce_checkout_order_review'); ?>
    </div>
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>