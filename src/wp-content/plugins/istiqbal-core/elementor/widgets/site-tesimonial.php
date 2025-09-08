<?php
/*
 * Elementor Istiqbal Testimonial Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Istiqbal_Testimonial extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_testimonial';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Testimonial', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-testimonial';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Testimonial widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['wpo-istiqbal_testimonial'];
	}
	
	/**
	 * Register Istiqbal Testimonial widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__( 'Testimonial Options', 'istiqbal-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'testimonial_title',
			[
				'label' => esc_html__( 'Testimonial Title Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_subtitle',
			[
				'label' => esc_html__( 'Testimonial Sub Title', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Testimonial Sub Title', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type testimonial Sub title here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_content',
			[
				'label' => esc_html__( 'Testimonial Content', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Testimonial Content', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type testimonial Content here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
	  $repeater->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Testimonial Image', 'istiqbal-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
	  $repeater->add_control(
			'quote_image',
			[
				'label' => esc_html__( 'Quot Image', 'istiqbal-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$this->add_control(
			'testimonialItems_groups',
			[
				'label' => esc_html__( 'Testimonial Items', 'istiqbal-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'testimonial_title' => esc_html__( 'Testimonial', 'istiqbal-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ testimonial_title }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		
		// Testimonial Name Style 
		$this->start_controls_section(
			'testimonials_section_name_style',
			[
				'label' => esc_html__( 'Testimonial Name', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'testimonials_istiqbal_name_typography',
				'selector' => '{{WRAPPER}}  .testimonial-card .top-content .title h2',
			]
		);
		$this->add_control(
			'testimonials_name_color',
			[
				'label' => esc_html__( 'Name Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-card .top-content .title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		// Testimonial Title Style 
		$this->start_controls_section(
			'testimonials_section_title_style',
			[
				'label' => esc_html__( 'Testimonial Title', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'testimonials_istiqbal_title_typography',
				'selector' => '{{WRAPPER}} .testimonial-card .top-content .title span',
			]
		);
		$this->add_control(
			'testimonials_title_color',
			[
				'label' => esc_html__( 'Name Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .testimonial-card .top-content .title span' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .testimonial-card .text',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-card .text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		
	}

	/**
	 * Render Testimonial widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$testimonialItems_groups = !empty( $settings['testimonialItems_groups'] ) ? $settings['testimonialItems_groups'] : [];


		// Turn output buffer on
		ob_start(); ?>
		<div class="testimonial-section">
    	<div class="container">
        <div class="testimonial-slider">
      		<?php 	// Group Param Output
					if( is_array( $testimonialItems_groups ) && !empty( $testimonialItems_groups ) ){
					foreach ( $testimonialItems_groups as $each_items ) { 

					$testimonial_title = !empty( $each_items['testimonial_title'] ) ? $each_items['testimonial_title'] : '';
					$testimonial_subtitle = !empty( $each_items['testimonial_subtitle'] ) ? $each_items['testimonial_subtitle'] : '';
					$testimonial_content = !empty( $each_items['testimonial_content'] ) ? $each_items['testimonial_content'] : '';

					$image_url = wp_get_attachment_url( $each_items['bg_image']['id'] );
					$image_alt = get_post_meta( $each_items['bg_image']['id'], '_wp_attachment_image_alt', true);

					$quote_url = wp_get_attachment_url( $each_items['quote_image']['id'] );
					$quote_alt = get_post_meta( $each_items['quote_image']['id'], '_wp_attachment_image_alt', true);

					?>
					<div class="testimonial-card">
	            <div class="top-content">
	                <div class="image">
	                  <?php if( $image_url ) { echo '<img src="'.esc_url( $image_url ).'" alt="'.esc_attr( $image_alt ).'">'; } ?>
	                </div>
	                <div class="title">
	                	 <?php 
											if( $testimonial_title ) { echo '<h2>'.esc_html( $testimonial_title ).'</h2>'; } 
                			if( $testimonial_subtitle ) { echo '<span>'.esc_html( $testimonial_subtitle ).'</span>'; }
                     ?>
	                </div>
	            </div>
	             <?php if( $testimonial_content ) { echo '<p class="text">'.esc_html( $testimonial_content ).'</p>'; } ?>
	            <div class="icon">
	                <?php if( $quote_url ) { echo '<img src="'.esc_url( $quote_url ).'" alt="'.esc_attr( $quote_alt ).'">'; } ?>
	            </div>
		        </div>
             <?php } 
           } ?>
		    </div>
		  </div>
		</div>
		<?php 
			// Return outbut buffer
			echo ob_get_clean();	
		}
	/**
	 * Render Testimonial widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Istiqbal_Testimonial() );