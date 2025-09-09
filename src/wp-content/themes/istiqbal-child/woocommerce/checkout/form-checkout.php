<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout custom-checkout-layout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="checkout-container">
		<!-- Left side: Billing & Shipping -->
		<div class="checkout-left">
			<h3 class="checkout-title"><?php esc_html_e( 'Customer Information', 'woocommerce' ); ?></h3>
			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<div id="customer_details" class="customer-details">
					<div class="billing-details">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>

					<div class="shipping-details">
						<h4><?php esc_html_e( 'Shipping Details', 'woocommerce' ); ?></h4>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>
		</div>

		<!-- Right side: Order summary -->
		<div class="checkout-right">
			<h3 class="checkout-title"><?php esc_html_e( 'Your Order', 'woocommerce' ); ?></h3>
			<div id="order_review" class="woocommerce-checkout-review-order order-summary">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		</div>
	</div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>