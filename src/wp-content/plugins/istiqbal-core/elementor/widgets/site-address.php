<?php
/*
 * Elementor Istiqbal Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Istiqbal_Address extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_address';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Address Info', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-icon-box';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Address widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['wpo-istiqbal_address'];
	}
	
	/**
	 * Register Istiqbal Address widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_address',
			[
				'label' => esc_html__( 'Address Options', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'address_desc',
			[
				'label' => esc_html__( 'Address Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Description', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'address_title',
			[
				'label' => esc_html__( 'Title Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Call: +88 659 789 874', 'istiqbal-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'istiqbal-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'addressItems_groups',
			[
				'label' => esc_html__( 'Address', 'istiqbal-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'address_title' => esc_html__( 'Address', 'istiqbal-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ address_title }}}',
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
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'istiqbal_title_typography',
				'selector' => '{{WRAPPER}} .footer-info ul li',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-info ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .footer-info ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		
	}

	/**
	 * Render Address widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$addressItems_groups = !empty( $settings['addressItems_groups'] ) ? $settings['addressItems_groups'] : [];
		// Turn output buffer on

		$address_desc = !empty( $settings['address_desc'] ) ? $settings['address_desc'] : '';
	
		ob_start(); ?>
		<div class="footer-info">
			<?php if ( $address_desc ) { ?>
				<p><?php echo esc_html( $address_desc ); ?></p>
			<?php } ?>
			
			<ul>
       <?php
	    		// Group Param Output
					if( is_array( $addressItems_groups ) && !empty( $addressItems_groups ) ){
					foreach ( $addressItems_groups as $each_item ) { 	
			
					$address_title = !empty( $each_item['address_title'] ) ? $each_item['address_title'] : '';
				

					if( $address_title ) { echo '<li>'.esc_html( $address_title ).'</li>'; }
	        
	       }
				}
			 ?>
		</ul>
		</div>
		<?php
			// Return outbut buffer
			echo ob_get_clean();	
		}
	/**
	 * Render Address widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Istiqbal_Address() );