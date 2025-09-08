<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
// Theme Options
$istiqbal_error_heading = cs_get_option('error_heading');
$istiqbal_error_subheading = cs_get_option('error_subheading');
$istiqbal_error_page_content = cs_get_option('error_page_content');
$istiqbal_error_btn_text = cs_get_option('error_btn_text');
$istiqbal_error_heading = ( $istiqbal_error_heading ) ? $istiqbal_error_heading : esc_html__( '404', 'istiqbal' );
$istiqbal_error_subheading = ( $istiqbal_error_subheading ) ? $istiqbal_error_subheading : esc_html__( 'Oops! Page Not Found!', 'istiqbal' );
$istiqbal_error_page_content = ( $istiqbal_error_page_content ) ? $istiqbal_error_page_content : esc_html__( 'We are sorry but we can not seem to find the page you requested. This might be because you have typed the web address incorrectly.', 'istiqbal' );
$istiqbal_error_btn_text = ( $istiqbal_error_btn_text ) ? $istiqbal_error_btn_text : esc_html__( 'BACK TO HOME', 'istiqbal' );
get_header(); ?>
<section class="error-404-section section-padding">
  <div class="container">
      <div class="row">
          <div class="col col-xs-12">
              <div class="content clearfix">
                  <div class="error">
                      <h2><?php echo esc_html( $istiqbal_error_heading ); ?></h2>
                  </div>
                  <div class="error-message">
                      <h3><?php echo esc_html( $istiqbal_error_subheading ); ?>!</h3>
                      <p><?php echo esc_html( $istiqbal_error_page_content ); ?></p>
                      <a href="<?php echo esc_url(home_url( '/' )); ?>" class="theme-btn">
                        <?php echo esc_html( $istiqbal_error_btn_text ); ?>
                      </a>
                  </div>
              </div>
          </div>
      </div> <!-- end row -->
  </div> <!-- end container -->
</section>
<?php
get_footer();