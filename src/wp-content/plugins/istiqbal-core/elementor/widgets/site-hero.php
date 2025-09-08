<?php
/*
 * Elementor Istiqbal Hero Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_Hero extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-istiqbal_hero';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Hero', 'istiqbal-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'ti-panel';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Hero widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-istiqbal_hero'];
	}

	/**
	 * Register Istiqbal Hero widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__('Hero Options', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'hero_style',
			[
				'label' => esc_html__('Hero Style', 'istiqbal-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'istiqbal-core'),
					'style-two' => esc_html__('Style two', 'istiqbal-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your hero style.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'topbar_logo',
			[
				'label' => esc_html__('Hero Topbar Logo', 'istiqbal-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__('Title Text', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('“turn to Allah before you return to Allah.”', 'istiqbal-core'),
				'placeholder' => esc_html__('Type title text here', 'istiqbal-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_content',
			[
				'label' => esc_html__('Content', 'istiqbal-core'),
				'default' => esc_html__('your content text', 'istiqbal-core'),
				'placeholder' => esc_html__('Type your content here', 'istiqbal-core'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'istiqbal-core'),
				'default' => esc_html__('button text', 'istiqbal-core'),
				'placeholder' => esc_html__('Type button Text here', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__('Button Link', 'istiqbal-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__('Choose Image', 'istiqbal-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'hero_shape',
			[
				'label' => esc_html__('Background Shape', 'istiqbal-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'frontend_available' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'istiqbal-core'),
			]
		);
		$this->end_controls_section(); // end: Section

		
		// Body Style
		$this->start_controls_section(
			'section_body_style',
			[
				'label' => esc_html__('Body Style', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_body_bg_color',
			[
				'label' => esc_html__('Background', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'istiqbal-core'),
				'name' => 'istiqbal_title_typography',
				'selector' => '{{WRAPPER}} .istiqbal-hero .content h2.title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .content h2.title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__('Title Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .content h2.title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__('Content', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'istiqbal-core'),
				'name' => 'section_content_typography',
				'selector' => '{{WRAPPER}} .istiqbal-hero .content .subtitle',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .content .subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__('Content Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .content .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__('Button', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_one_typography',
				'label' => esc_html__('Typography', 'istiqbal-core'),
				'selector' => '{{WRAPPER}} .istiqbal-hero .theme-btn',
			]
		);
		$this->start_controls_tabs('button_one_style');
		$this->start_controls_tab(
			'button_one_normal',
			[
				'label' => esc_html__('Normal', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'button_one_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_color',
			[
				'label' => esc_html__('Background', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_one_hover',
			[
				'label' => esc_html__('Hover', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'button_one_hover_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_hover_color',
			[
				'label' => esc_html__('Background Hover', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-hero .theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section



	}

	/**
	 * Render Hero widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$hero_style = !empty($settings['hero_style']) ? $settings['hero_style'] : '';

		$hero_title = !empty($settings['hero_title']) ? $settings['hero_title'] : '';
		$hero_content = !empty($settings['hero_content']) ? $settings['hero_content'] : '';

		$bg_image = !empty($settings['hero_image']['id']) ? $settings['hero_image']['id'] : '';
		$bg_image2 = !empty($settings['topbar_logo']['id']) ? $settings['topbar_logo']['id'] : '';
		$bg_image3 = !empty($settings['hero_shape']['id']) ? $settings['hero_shape']['id'] : '';

		$button_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';
		$button_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$button_link_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$button_link_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);

		$image2_url = wp_get_attachment_url($bg_image2);
		$image2_alt = get_post_meta($bg_image2, '_wp_attachment_image_alt', true);

		$image3_url = wp_get_attachment_url($bg_image3);


		$istiqbal_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="btn theme-btn">' . esc_html($button_text) . '</a>' : '';

		if ($image3_url) {
			$bg_url = ' style="';
			$bg_url .= ($image3_url) ? 'background-image: url( ' . esc_url($image3_url) . ' );' : '';
			$bg_url .= '"';
		} else {
			$bg_url = '';
		}


		if ( $hero_style == 'style-one') {
			 	$hero_class = 'static-hero';
		} else {
				$hero_class = 'static-hero-s2';
		}

		// Turn output buffer on
		ob_start(); ?>
		<div class=" istiqbal-hero <?php echo esc_attr( $hero_class ); ?>" <?php echo $bg_url; ?>>
	    <div class="container-fluid">
	        <div class="content">
	            <div class="icon">
                <?php if ($image2_url) {
									echo '<img src="' . esc_url($image2_url) . '" alt="' . esc_url($image2_alt) . '">';
								} ?>
	            </div>
	            <?php 
								if ($hero_title) { ?>
	            <h2 class="title"><?php echo esc_html($hero_title); ?></h2>
	             <?php }
								if ($hero_content) { ?> 
	            <span class="subtitle"><?php echo esc_html($hero_content); ?></span>
	             <?php } ?>
	            <div class="hero-btn">
	               <?php echo $istiqbal_button; ?>
	            </div>
	        </div>
	        <?php	if ( $hero_style == 'style-one') { ?>
		        <div class="right-img">
		          <?php if ($image_url) {
									echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
								} ?>
		        </div>
	      	<?php } ?>
	    </div>
	    <?php	if ( $hero_style == 'style-two') { ?>
	    <div class="image">
         <?php if ($image_url) {
						echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
					} ?>
      </div>
      <?php } ?>
	</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Hero widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_Hero());
