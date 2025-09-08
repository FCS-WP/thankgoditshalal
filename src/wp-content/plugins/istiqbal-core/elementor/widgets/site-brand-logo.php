<?php
/*
 * Elementor Istiqbal brand Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Istiqbal_brand extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_brand';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Site Logo', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-logo';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal brand widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['wpo-istiqbal_brand'];
	}
	*/
	
	/**
	 * Register Istiqbal brand widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_brand',
			[
				'label' => esc_html__( 'Brand Options', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'brand_logo',
			[
				'label' => esc_html__( 'Site Logo', 'istiqbal-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your image.', 'istiqbal-core'),
			]
		);
		$this->end_controls_section();// end: Section

		



	}

	/**
	 * Render brand widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$bg_image = !empty( $settings['brand_logo']['id'] ) ? $settings['brand_logo']['id'] : '';	
			// Image
		$image_url = wp_get_attachment_url( $bg_image );
		$image_alt = get_post_meta( $bg_image, '_wp_attachment_image_alt', true);

		// Turn output buffer on
		ob_start(); ?>
		<div class="site-navbar-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if( $image_url ) { echo '<img src="'.esc_url( $image_url ).'" alt="'.esc_url( $image_alt ).'">'; }  ?>
			</a>
		</div>
	<?php // Return outbut buffer
		echo ob_get_clean();
		
	}
	/**
	 * Render brand widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Istiqbal_brand() );