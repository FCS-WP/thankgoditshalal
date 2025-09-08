<?php
/*
 * Elementor Istiqbal Funfact Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Istiqbal_Funfact extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_funfact';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Funfact', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-counter';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Funfact widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['wpo-istiqbal_funfact'];
	}
	
	/**
	 * Register Istiqbal Funfact widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_funfact',
			[
				'label' => esc_html__( 'Funfact Options', 'istiqbal-core' ),
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
				'default' => esc_html__( 'Content Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type Content text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button/Link Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'istiqbal-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'funfact_title',
			[
				'label' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_number',
			[
				'label' => esc_html__( 'Funfact Number', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '250', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type funfact Number here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_plus',
			[
				'label' => esc_html__( 'Funfact Plus/Percentage', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type funfact Plus/Percentage here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'funfactItems_groups',
			[
				'label' => esc_html__( 'Funfact Items', 'istiqbal-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'funfact_title' => esc_html__( 'Funfact', 'istiqbal-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ funfact_title }}}',
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
				'selector' => '{{WRAPPER}} .funfact-content .top-content .title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funfact-content .top-content .title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .funfact-content .top-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .funfact-content .top-content .text',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funfact-content .top-content .text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
	

		// Funfact Number
		$this->start_controls_section(
			'funfact_number_style',
			[
				'label' => esc_html__( 'Number', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'istiqbal_number_typography',
				'selector' => '{{WRAPPER}} .funfact .item h2',
			]
		);
		$this->add_control(
			'funfact_item_number_color',
			[
				'label' => esc_html__( 'Number Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funfact .item h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_padding',
			[
				'label' => __( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .funfact .item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Funfact Title
		$this->start_controls_section(
			'funfact_title_style',
			[
				'label' => esc_html__( 'Funfact Title', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'istiqbal_funfact_title_typography',
				'selector' => '{{WRAPPER}} .funfact .item h4',
			]
		);
		$this->add_control(
			'funfact_title',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .funfact .item h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'funfact_title_padding',
			[
				'label' => __( 'Number Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .funfact .item h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section


			// Button Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .funfact-section .funfact-content .theme-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'istiqbal-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .funfact-section .funfact-content .theme-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .funfact-section .funfact-content .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .funfact-section .funfact-content .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'istiqbal-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .funfact-section .funfact-content .theme-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .funfact-section .funfact-content .theme-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .funfact-section .funfact-content .theme-btn',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'istiqbal-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .funfact-section .funfact-content .theme-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .funfact-section .funfact-content .theme-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .funfact-section .funfact-content .theme-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		
	}

	/**
	 * Render Funfact widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$funfactItems_groups = !empty( $settings['funfactItems_groups'] ) ? $settings['funfactItems_groups'] : [];

		$section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
		$section_content = !empty( $settings['section_content'] ) ? $settings['section_content'] : '';

		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';

		$btn_link = !empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty( $settings['btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$button = $btn_link ? '<a href="'.esc_url($btn_link).'" '.esc_attr( $btn_link_attr ).' class="theme-btn" >'.esc_html( $btn_text ).'</a>' : '';

		// Turn output buffer on
		ob_start(); ?>
		<div class="funfact-section">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-6 col-md-10 col-12">
		                <div class="funfact-content">
		                    <div class="top-content">
		                         <?php  
											      	if( $section_title ) { echo '<h3 class="title">'.esc_html( $section_title ).'</h3>'; }
											      	if( $section_content ) { echo '<p class="text">'.esc_html( $section_content ).'</p>'; }
											      ?>
		                    </div>
		                    <div class="funfact">
		                    		<?php 	// Group Param Output
														if( is_array( $funfactItems_groups ) && !empty( $funfactItems_groups ) ){
														foreach ( $funfactItems_groups as $each_item ) { 
														$funfact_title = !empty( $each_item['funfact_title'] ) ? $each_item['funfact_title'] : '';
														$funfact_number = !empty( $each_item['funfact_number'] ) ? $each_item['funfact_number'] : '';
														$funfact_plus = !empty( $each_item['funfact_plus'] ) ? $each_item['funfact_plus'] : '';
														?>
		                        <div class="item">
		                        	 <?php 
							            		if( $funfact_number ) { echo '<h2><span class="odometer" data-count="'.esc_attr( $funfact_number ).'">'.esc_html__( '00','istiqbal-core' ).'</span>'.esc_html( $funfact_plus ).'</h2>'; } 
							            		 if( $funfact_title ) { echo '<h4>'.esc_html__( $funfact_title ).'</h4>'; }
							            		?>
		                        </div>
		                        <?php 
						               		}
														} 
													?>
		                    </div>
		                   <?php echo $button; ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<?php 
			// Return outbut buffer
			echo ob_get_clean();	
		}
	/**
	 * Render Funfact widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Istiqbal_Funfact() );