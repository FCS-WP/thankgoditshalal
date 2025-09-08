<?php
/*
 * Elementor Istiqbal Slider Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Site_Slider extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_slider';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Slider', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-post-slider';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	
	public function get_script_depends() {
		return ['wpo-istiqbal_slider'];
	}
	 
	
	/**
	 * Register Istiqbal Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Slider Options', 'istiqbal-core' ),
			]
		);
		$repeater = new Repeater();
		 $repeater->add_control(
			'slide_color',
			[
				'label' => esc_html__( 'Shape Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .hero-slider .hero-shape svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'slider_title',
			[
				'label' => esc_html__( 'Slider title', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'They Are Wait For Some Food.',
				'placeholder' => esc_html__( 'Type slide title here', 'istiqbal-core' ),
			]
		);
		$repeater->add_control(
			'slider_content',
			[
				'label' => esc_html__( 'Slider content', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Slider Details content',
				'placeholder' => esc_html__( 'Type slide content here', 'istiqbal-core' ),
			]
		);
		$repeater->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button Text', 'istiqbal-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Get Started',
				'placeholder' => esc_html__( 'Type your button text here', 'istiqbal-core' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'istiqbal-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'istiqbal-core' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
				],
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Image', 'istiqbal-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__( 'Slider Items', 'istiqbal-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_title' => esc_html__( 'Item #1', 'istiqbal-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Slider Extra Options', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'istiqbal-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'istiqbal-core' ),
				'label_off' => esc_html__( 'No', 'istiqbal-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'istiqbal-core' ),
			]
		);
		$this->end_controls_section();// end: Section


		// Slide
		$this->start_controls_section(
			'section_slide_option_style',
			[
				'label' => esc_html__( 'Slide', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'slide_margin',
			[
				'label' => __( 'Margin', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-inner .slide-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'slide_height',
			[
				'label' => esc_html__( 'height', 'consoel-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 500,
						'max' => 1000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 900,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-slider' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slide_overly_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-inner:before' => 'background-color: {{VALUE}};',
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-slider .slide-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-title h2' => 'color: {{VALUE}};',
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
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .hero-slider .slide-text p',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section


		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_active_color',
			[
				'label' => esc_html__( 'Active Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet-active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_active_line_color',
			[
				'label' => esc_html__( 'Line Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .hero-slider .slide-btns .theme-btn',
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
					'{{WRAPPER}} .hero-slider .slide-btns .theme-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .hero-slider .slide-btns .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .hero-slider .slide-btns .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .hero-slider .slide-btns .theme-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .hero-slider .slide-btns .theme-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .hero-slider .slide-btns .theme-btn',
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
						'{{WRAPPER}} .hero-slider .slide-btns .theme-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .hero-slider .slide-btns .theme-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .hero-slider .slide-btns .theme-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section


	
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Carousel Options
		$swipeSliders_groups = !empty( $settings['swipeSliders_groups'] ) ? $settings['swipeSliders_groups'] : [];
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
	

		// Turn output buffer on
		ob_start();

		?>

		<div class="hero-slider">
    	<div class="swiper-container">
        <div class="swiper-wrapper">
	        	<?php
						if( is_array( $swipeSliders_groups ) && !empty( $swipeSliders_groups ) ){
						foreach ( $swipeSliders_groups as $each_item ) {

							$image_url = wp_get_attachment_url( $each_item['slider_image']['id'] );

							$slider_title = !empty( $each_item['slider_title'] ) ? $each_item['slider_title'] : '';
							$slider_content = !empty( $each_item['slider_content'] ) ? $each_item['slider_content'] : '';

							$button_text = !empty( $each_item['btn_txt'] ) ? $each_item['btn_txt'] : '';
							$button_link = !empty( $each_item['button_link']['url'] ) ? $each_item['button_link']['url'] : '';
							$button_link_external = !empty( $each_item['button_link']['is_external'] ) ? 'target="_blank"' : '';
							$button_link_nofollow = !empty( $each_item['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
							$button_link_attr = !empty( $button_link ) ?  $button_link_external.' '.$button_link_nofollow : '';

							$button_one = $button_link ? '<a href="'.esc_url($button_link).'" '.$button_link_attr.' class="theme-btn" >'. $button_text .'</a>' : '';

							$button_actual = ($button_one ) ? '<div data-swiper-parallax="500" class="slide-btns">'.$button_one.'</div>' : '';

						?>

            <div class="swiper-slide">
              <div class="slide-inner slide-bg-image" data-background="<?php echo esc_url( $image_url ); ?>">
                  <!-- <div class="gradient-overlay"></div> -->
                  <div class="container-fluid">
                      <div class="slide-content">
                      	<?php if ( $slider_title ) { ?>
                      		<div data-swiper-parallax="300" class="slide-title">
                              <h2><?php echo esc_html( $slider_title ); ?></h2>
                          </div>
                      	<?php } if ( $slider_content ) { ?>
                      	<div data-swiper-parallax="400" class="slide-text">
                              <p><?php echo esc_html( $slider_content ); ?></p>
                          </div>
                      	<?php } ?>
                          <div class="clearfix"></div>
                          <div data-swiper-parallax="500" class="slide-btns">
                               <?php echo $button_actual; ?>
                          </div>
                      </div>
                  </div>
              </div> <!-- end slide-inner -->
          </div> <!-- end swiper-slide -->

            <!-- end swiper-slide -->
	          <?php }
						} ?>
	        </div>
	        <!-- end swiper-wrapper -->
	      <?php if( $carousel_nav ){ ?>
	        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
	      <?php } ?>
	    </div>
		</div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Site_Slider() );
