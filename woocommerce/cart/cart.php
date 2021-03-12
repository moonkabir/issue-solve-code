<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>
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
 
 	<div class="wc-proceed-to-checkout wc-proceed-to-checkout-extra">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>
    
    <div class="all_payment_div all_payment_div_extra"><p><img class="all_payment" src="https://woocommerce-532574-1802103.cloudwaysapps.com/wp-contents/uploads/2021/03/all_payment_logo.png"></p></div>
 
 
<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" class="cart-form">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table shop_table_responsive cart" cellspacing="0">
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
		<tr class="shop_table_header">
			<td>Produkter</td>
			<td>Produktnavn</td>
			<td>Pris</td>
			<td>Antal</td>
			<td>Slet</td>
		</tr>
		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
				$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				?>

				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> shop_table_list">

					<td class="product_image">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'shop_catalog' ), $cart_item, $cart_item_key );
							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
							
                            // Backorder notification
                            echo("<p class='product-value'>".$cart_item['quantity']."</p>");
						?>
					</td>
					
					<td class="product_name">
						<h5><?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
							}
						?></h5>
					</td>

					<td class="product_price">
						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<div class="price">' . sprintf( '%s', $product_price ) . '</div>', $cart_item, $cart_item_key ); ?>	
					</td>

						<td class="product_quantity">
							<?php 
								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '<input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0',
										'type'		  => 'text'
									), $_product, false );
								}
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td>
                    
                    
                    
                    
                    
<td class="product_delete-icon">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove-item" title="%s" data-product_id="%s" data-product_sku="%s">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
									<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
									<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>
				</tr>
				<!-- <hr> -->
				<div class="product_text">
					<div class="product_text_right">
						<?php echo WC()->cart->get_item_data( $cart_item ); ?>
					</div>
				</div>
				<?php
			}
		}
		do_action( 'woocommerce_cart_contents' );
		?>
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
</table>


<div class="actions">

	<input type="submit" class="button update_button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />
    
	<?php if ( wc_coupons_enabled() ) { ?>
		<table class="coupon">
			<tr>
				<td><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'BRUG RABATKODE &#8681;', 'woocommerce' ); ?>"/></td>
			
				<td class="delivary">
					<img src="https://woocommerce-532574-1802103.cloudwaysapps.com/wp-contents/uploads/2021/03/truck-7.png">
					<p>1-5 dages fragt</p>
				</td>
				<td class="webshop">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 258.41 212.44" style="enable-background:new 0 0 258.41 212.44;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#FF0100;}
	.st1{fill:none;}
</style>
<g>
	<rect x="7.82" y="114.78" class="st0" width="91.04" height="91.23"/>
	<rect x="7.82" y="6.43" class="st0" width="91.04" height="91.23"/>
	<rect x="115.99" y="114.78" class="st0" width="134.61" height="91.23"/>
	<rect x="115.99" y="6.43" class="st0" width="134.61" height="91.23"/>
</g>
<polygon class="st1" points="-152.12,-115.45 -154.57,-115.45 -154.57,-111.76 -148.8,-111.76 "/>
</svg>
					<p>dansk webshop</p>
				</td>
			</tr>
			<?php do_action( 'woocommerce_cart_coupon' ); ?>
		</table>
		
	<?php } ?>

	<?php do_action( 'woocommerce_cart_actions' ); ?>

	<?php wp_nonce_field( 'woocommerce-cart' ); ?>
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
	
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>