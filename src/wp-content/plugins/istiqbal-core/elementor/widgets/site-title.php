<?php
/*
 * Elementor Istiqbal Title Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Istiqbal_Title extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_title';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Title', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Title widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['wpo-istiqbal_title'];
	}
	*/
	
	/**
	 * Register Istiqbal Title widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_Title',
			[
				'label' => esc_html__( 'Title Options', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'title_style',
			[
				'label' => esc_html__('Title Style', 'istiqbal-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'istiqbal-core'),
					'style-two' => esc_html__('Style two', 'istiqbal-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your about style.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => esc_html__( 'Sub Title Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'title_style' => array('style-one'),
				],
				'default' => esc_html__( 'Sub Title Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type subtitle text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__( 'Content Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'condition' => [
					'title_style' => array('style-one'),
				],
				'default' => esc_html__( 'Content Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type Content text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->end_controls_section();// end: Section

	
		// Sub Title
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'istiqbal_subtitle_typography',
				'selector' => '{{WRAPPER}} .wpo-section-title span',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title span' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'subtitle_padding',
			[
				'label' => __( 'Title Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,				
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
	
		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'istiqbal_title_typography',
				'selector' => '{{WRAPPER}} .wpo-section-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title h2' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,				
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'section_content_typography',
				'selector' => '{{WRAPPER}} .wpo-section-title p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
	
		
		
	}

	/**
	 * Render Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title_style = !empty($settings['title_style']) ? $settings['title_style'] : '';
		$section_subtitle = !empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : '';
		$section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
		$section_content = !empty( $settings['section_content'] ) ? $settings['section_content'] : '';

		$section_title = preg_replace('~\s*<br ?/?>\s*~'," <br/>",$section_title);
    $section_title = nl2br(	$section_title );



		// Turn output buffer on

		ob_start(); ?>

		<?php if ( $title_style == 'style-one') { ?>
		<div class="container">
			<div class="row justify-content-center">
	        <div class="col-12">
	            <div class="section-title text-center">
	               <?php 
	                if( $section_subtitle ) { echo '<h2>'.esc_html( $section_subtitle ).'</h2>'; } 
					      	if( $section_title ) { echo '<h3>'.esc_html( $section_title ).'</h3>'; }
					      	if( $section_content ) { echo '<p>'.esc_html( $section_content ).'</p>'; }
					      ?>
	            </div>
	        </div>
	    </div>
    </div>
		<?php } else { ?>
				<div class="site-footer-title">	
					<?php 
				     if( $section_title ) { echo '<h2>'.esc_html( $section_title ).'</h2>'; }
				   ?>
				</div>
		<?php } ?>
	
		 	<?php 
		// Return outbut buffer
		echo ob_get_clean();
		
	}
	/**
	 * Render Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Istiqbal_Title() );