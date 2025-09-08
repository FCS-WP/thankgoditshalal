<?php
/*
 * Elementor Istiqbal About Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_About extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-istiqbal_about';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('About', 'istiqbal-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-site-identity';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal About widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-istiqbal_about'];
	}

	/**
	 * Register Istiqbal About widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_about',
			[
				'label' => esc_html__('About Options', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'about_style',
			[
				'label' => esc_html__('About Style', 'istiqbal-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'istiqbal-core'),
					'style-two' => esc_html__('Style two', 'istiqbal-core'),
					'style-three' => esc_html__('Style Three', 'istiqbal-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your about style.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'about_subtitle',
			[
				'label' => esc_html__('Sub Title Text', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('About Us', 'istiqbal-core'),
				'placeholder' => esc_html__('Sub Type title text here', 'istiqbal-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_title',
			[
				'label' => esc_html__('Title Text', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('We Can Work Together For Create a Better Future..', 'istiqbal-core'),
				'placeholder' => esc_html__('Sub Type title text here', 'istiqbal-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_content',
			[
				'label' => esc_html__('Content', 'istiqbal-core'),
				'default' => esc_html__('your content text', 'istiqbal-core'),
				'placeholder' => esc_html__('Type your content here', 'istiqbal-core'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => esc_html__('About Image', 'istiqbal-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'about_image2',
			[
				'label' => esc_html__('About Image 2', 'istiqbal-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'about_style' => array('style-one'),
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'about_icon',
			[
				'label' => __('Icon', 'istiqbal-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fi flaticon-phone-call',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'about_number',
			[
				'label' => esc_html__('About Number', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('+6845550102', 'istiqbal-core'),
				'placeholder' => esc_html__('Sub Type about Number text here', 'istiqbal-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'number_title',
			[
				'label' => esc_html__('Number Title', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Call Us:', 'istiqbal-core'),
				'placeholder' => esc_html__('Sub Type about Number title here', 'istiqbal-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button/Link Text', 'istiqbal-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'istiqbal-core'),
				'placeholder' => esc_html__('Type btn text here', 'istiqbal-core'),
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
		$this->end_controls_section(); // end: Section


		// Sub Title
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__('SubTitle', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'istiqbal_subtitle_typography',
				'selector' => '{{WRAPPER}} .istiqbal-about .section-title h2',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_padding',
			[
				'label' => esc_html__('Title Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'istiqbal_title_typography',
				'selector' => '{{WRAPPER}} .istiqbal-about .section-title h3',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __('Title Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .istiqbal-about .section-title p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => __('Content Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .istiqbal-about .theme-btn',
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __('Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('button_style');
		$this->start_controls_tab(
			'button_normal',
			[
				'label' => esc_html__('Normal', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'istiqbal-core'),
				'selector' => '{{WRAPPER}} .istiqbal-about .theme-btn',
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_hover',
			[
				'label' => esc_html__('Hover', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_hover_color',
			[
				'label' => esc_html__('Background Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .istiqbal-about .theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => esc_html__('Border', 'istiqbal-core'),
				'selector' => '{{WRAPPER}} .istiqbal-about .theme-btn:hover',
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section


		// Number
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__('Number', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'istiqbal-core'),
				'name' => 'section_number_typography',
				'selector' => '{{WRAPPER}} .about-section .about-bottom .call .text a',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-section .about-bottom .call .text a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_padding',
			[
				'label' => __('Padding', 'istiqbal-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .about-section .about-bottom .call .text a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Icon
		$this->start_controls_section(
			'call_icon_style',
			[
				'label' => esc_html__('Icon Style', 'istiqbal-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Color', 'istiqbal-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-section .about-bottom .call i:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

	}

	/**
	 * Render About widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$about_style = !empty($settings['about_style']) ? $settings['about_style'] : '';
		$about_subtitle = !empty($settings['about_subtitle']) ? $settings['about_subtitle'] : '';
		$about_title = !empty($settings['about_title']) ? $settings['about_title'] : '';
		$about_content = !empty($settings['about_content']) ? $settings['about_content'] : '';

		$btn_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';

		$btn_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$btn_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty($btn_link) ?  $btn_external . ' ' . $btn_nofollow : '';

		$button = $btn_link ? '<a href="' . esc_url($btn_link) . '" ' . esc_attr($btn_link_attr) . ' class="theme-btn" >' . esc_html($btn_text) . '</a>' : '';

		$about_number = !empty($settings['about_number']) ? $settings['about_number'] : '';
		$number_title = !empty($settings['number_title']) ? $settings['number_title'] : '';

		$bg_image = !empty($settings['about_image']['id']) ? $settings['about_image']['id'] : '';
		$bg_image2 = !empty($settings['about_image2']['id']) ? $settings['about_image2']['id'] : '';

		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);
		// Image
		$image2_url = wp_get_attachment_url($bg_image2);
		$image2_alt = get_post_meta($bg_image2, '_wp_attachment_image_alt', true);

		$about_icon = !empty($settings['about_icon']['value']) ? $settings['about_icon']['value'] : '';
		$about_svg_url = !empty($settings['about_icon']['value']['url']) ? $settings['about_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($about_svg_url, '_wp_attachment_image_alt', true);

		// Turn output buffer on
		ob_start(); ?>

		<?php if ($about_style == 'style-one') { ?>
			<div class="istiqbal-about about-section">
				<div class="container">
					<div class="wrap">
						<div class="left-img">
							<div class="about-1">
								<?php if ($image_url) {
									echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
								}  ?>
							</div>
							<div class="about-2">
								<?php if ($image2_url) {
									echo '<img src="' . esc_url($image2_url) . '" alt="' . esc_url($image2_alt) . '">';
								}  ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 offset-lg-6">
								<div class="content">
									<div class="section-title">
										<?php
										if ($about_subtitle) {
											echo '<h2>' . esc_html($about_subtitle) . '</h2>';
										}
										if ($about_title) {
											echo '<h3>' . wp_kses_post($about_title) . '</h3>';
										}
										if ($about_content) {
											echo wp_kses_post($about_content);
										}
										?>
									</div>
									<div class="about-bottom">
										<?php echo $button; ?>
										<div class="call">
											<div class="icon">
												<?php
												if ($about_svg_url) {
													echo '<img class="default-icon"  src="' . esc_url($about_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
												} else {
													echo '<i class="' . esc_attr($about_icon) . '"></i>';
												}
												?>
											</div>
											<div class="text">
												<?php if ($number_title) {
													echo '<span>' . esc_html($number_title) . '</span>';
												} ?>

												<?php if ($about_number) { ?>
													<a href="tel:<?php echo esc_url($about_number); ?>">
														<?php if ($about_number) {
															echo esc_html($about_number);
														} ?>
													</a>
												<?php	} ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($about_style == 'style-two') { ?>
			<div class="istiqbal-about about-section-s2">
				<div class="container">
					<div class="wrap">
						<div class="row align-items-center">
							<div class="col-lg-6 col-12">
								<div class="image">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
									}  ?>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="content">
									<div class="section-title">
										<?php
										if ($about_subtitle) {
											echo '<h2>' . esc_html($about_subtitle) . '</h2>';
										}
										if ($about_title) {
											echo '<h3>' . wp_kses_post($about_title) . '</h3>';
										}
										if ($about_content) {
											echo wp_kses_post($about_content);
										}
										?>
									</div>
									<div class="about-bottom">
										<?php echo $button; ?>

										<div class="call">
											<div class="icon">
												<?php
												if ($about_svg_url) {
													echo '<img class="default-icon"  src="' . esc_url($about_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
												} else {
													echo '<i class="' . esc_attr($about_icon) . '"></i>';
												}
												?>
											</div>
											<div class="text">
												<?php if ($number_title) {
													echo '<span>' . esc_html($number_title) . '</span>';
												} ?>

												<?php if ($about_number) { ?>
													<a href="tel:<?php echo esc_url($about_number); ?>">
														<?php if ($about_number) {
															echo esc_html($about_number);
														} ?>
													</a>
												<?php	} ?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="istiqbal-about about-section-s3">
				<div class="container">
					<div class="wrap">
						<div class="row align-items-center">
							<div class="col-lg-6 col-12">
								<div class="image">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
									}  ?>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="content">
									<div class="section-title">
										<?php
										if ($about_subtitle) {
											echo '<h2>' . esc_html($about_subtitle) . '</h2>';
										}
										if ($about_title) {
											echo '<h3>' . wp_kses_post($about_title) . '</h3>';
										}
										if ($about_content) {
											echo wp_kses_post($about_content);
										}
										?>
									</div>
									<div class="about-bottom">
										<?php echo $button; ?>

										<div class="call">
											<div class="icon">
												<?php
												if ($about_svg_url) {
													echo '<img class="default-icon"  src="' . esc_url($about_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
												} else {
													echo '<i class="' . esc_attr($about_icon) . '"></i>';
												}
												?>
											</div>
											<div class="text">
												<?php if ($number_title) {
													echo '<span>' . esc_html($number_title) . '</span>';
												} ?>

												<?php if ($about_number) { ?>
													<a href="tel:<?php echo esc_url($about_number); ?>">
														<?php if ($about_number) {
															echo esc_html($about_number);
														} ?>
													</a>
												<?php	} ?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php }
		echo ob_get_clean();
	}
	/**
	 * Render About widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_About());
