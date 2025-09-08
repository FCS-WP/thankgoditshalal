<?php
/*
 * Elementor Istiqbal Event Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Site_Event extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'wpo-istiqbal_event';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Event', 'istiqbal-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-calendar';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Istiqbal Event widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['wpo-istiqbal_event'];
	}
	
	/**
	 * Register Istiqbal Event widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){


		$posts = get_posts( 'post_type="event"&numberposts=-1' );
    $PostID = array();
    if ( $posts ) {
      foreach ( $posts as $post ) {
        $PostID[ $post->ID ] = $post->ID;
      }
    } else {
      $PostID[ __( 'No ID\'s found', 'istiqbal' ) ] = 0;
    }
		

		$this->start_controls_section(
			'section_event_listing',
			[
				'label' => esc_html__( 'Listing Options', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'event_style',
			[
				'label' => esc_html__('Event Style', 'istiqbal-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'istiqbal-core'),
					'style-two' => esc_html__('Style two', 'istiqbal-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your event style.', 'istiqbal-core'),
			]
		);
		$this->add_control(
			'event_limit',
			[
				'label' => esc_html__( 'Event Limit', 'istiqbal-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'istiqbal-core' ),
			]
		);
		$this->add_control(
			'event_order',
			[
				'label' => __( 'Order', 'istiqbal-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'istiqbal-core' ),
					'DESC' => esc_html__( 'Desending', 'istiqbal-core' ),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'event_orderby',
			[
				'label' => __( 'Order By', 'istiqbal-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'istiqbal-core' ),
					'ID' => esc_html__( 'ID', 'istiqbal-core' ),
					'author' => esc_html__( 'Author', 'istiqbal-core' ),
					'title' => esc_html__( 'Title', 'istiqbal-core' ),
					'date' => esc_html__( 'Date', 'istiqbal-core' ),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'event_show_category',
			[
				'label' => __( 'Certain Categories?', 'istiqbal-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'event_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'event_show_id',
			[
				'label' => __( 'Certain ID\'s?', 'istiqbal-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->end_controls_section();// end: Section

	
		// Event Title
		$this->start_controls_section(
			'section_event_title_style',
			[
				'label' => esc_html__( 'Title', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'istiqbal_event_title_typography',
				'selector' => '{{WRAPPER}} .event-wrap .content-wrap .content .title, .event-single-card .content h2',
			]
		);
		$this->add_control(
			'event_title_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content .title, .event-single-card .content h2 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'event_title_padding',
			[
				'label' => esc_html__( 'Title Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content .title, .event-single-card .content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	
		// Event Date
		$this->start_controls_section(
			'section_event_time_style',
			[
				'label' => esc_html__( 'Meta Data', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'event_time_typography_color',
				'selector' => '{{WRAPPER}} .event-wrap .content-wrap .content ul li, .event-single-card .content ul li',
			]
		);
		$this->add_control(
			'event_time_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content ul li, .event-wrap .content-wrap .content ul li i, .event-single-card .content ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'event_time_padding',
			[
				'label' => esc_html__( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content ul li, .event-single-card .content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Countdown
		$this->start_controls_section(
			'section_event_countdown_style',
			[
				'label' => esc_html__( 'Countdown', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'event_countdown_typography_color',
				'selector' => '{{WRAPPER}} .event-date .item h2',
			]
		);
		$this->add_control(
			'event_countdown_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-date .item h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'event_countdown_border_radious_color',
			[
				'label' => esc_html__( 'Border Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-date .item h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'event_countdown_padding',
			[
				'label' => esc_html__( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-date .item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Countdown Day
		$this->start_controls_section(
			'section_event_countdown_days_style',
			[
				'label' => esc_html__( 'Days', 'istiqbal-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'istiqbal-core' ),
				'name' => 'event_countdown_days_typography_color',
				'selector' => '{{WRAPPER}} .event-date .item span',
			]
		);
		$this->add_control(
			'event_countdown_days_color',
			[
				'label' => esc_html__( 'Color', 'istiqbal-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-date .item span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'event_countdown_padding',
			[
				'label' => esc_html__( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-date .item span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button
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
				'selector' => '{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn',
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'istiqbal-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn',
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
						'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'istiqbal-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'istiqbal-core' ),
					'selector' => '{{WRAPPER}} .event-wrap .content-wrap .content .theme-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		
	}

	/**
	 * Render Event widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$event_style = !empty($settings['event_style']) ? $settings['event_style'] : '';
		$event_limit = !empty( $settings['event_limit'] ) ? $settings['event_limit'] : '';
		$event_order = !empty( $settings['event_order'] ) ? $settings['event_order'] : '';
		$event_orderby = !empty( $settings['event_orderby'] ) ? $settings['event_orderby'] : '';
		$event_show_category = !empty( $settings['event_show_category'] ) ? $settings['event_show_category'] : [];
		$event_show_id = !empty( $settings['event_show_id'] ) ? $settings['event_show_id'] : [];

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if( get_query_var( 'paged' ) )
		  $my_page = get_query_var( 'paged' );
		else {
		  if( get_query_var( 'page' ) )
			$my_page = get_query_var( 'page' );
		  else
			$my_page = 1;
		  set_query_var( 'paged', $my_page );
		  $paged = $my_page;
		}

    if ($event_show_id) {
			$event_show_id = json_encode( $event_show_id );
			$event_show_id = str_replace(array( '[', ']' ), '', $event_show_id);
			$event_show_id = str_replace(array( '"', '"' ), '', $event_show_id);
      $event_show_id = explode(',',$event_show_id);
    } else {
      $event_show_id = '';
    }

		$args = array(
		  // other query params here,
		  'paged' => $my_page,
		  'post_type' => 'event',
		  'posts_per_page' => (int)$event_limit,
		  'event_category' => implode(',', $event_show_category),
		  'orderby' => $event_orderby,
		  'order' => $event_order,
      'post__in' => $event_show_id,
		);

		$istiqbal_event = new \WP_Query( $args );

		?>

		<?php if ( $event_style == 'style-one') { ?>
			<div class="event-section">
		    <div class="container">
		        <div class="event-active">
		        	<?php 
								if ( $istiqbal_event->have_posts()) : while ( $istiqbal_event->have_posts()) : $istiqbal_event->the_post();
				        global $post;

				        $event_options = get_post_meta( get_the_ID(), 'event_options', true );
								$event_location = isset($event_options['location_address']) ? $event_options['location_address'] : '';
								$event_time = isset($event_options['event_time']) ? $event_options['event_time'] : '';
								$event_date = isset($event_options['event_date']) ? $event_options['event_date'] : '';
								$button_text = isset($event_options['button_text']) ? $event_options['button_text'] : '';
								$button_link = isset($event_options['button_link']) ? $event_options['button_link'] : '';
								$event_image = isset($event_options['event_image']) ? $event_options['event_image'] : '';

				      	$image_url = wp_get_attachment_url( $event_image );
		          	$image_alt = get_post_meta( $event_image , '_wp_attachment_image_alt', true);
				       
							  ?>
		            <div class="event-wrap">
		                <div class="image-wrap">
		                    <div class="image">
		                      <?php if( $image_url ) { echo '<img src="'.esc_url( $image_url ).'" alt="'.esc_url( $image_alt ).'">'; } ?>
		                    </div>
		                </div>
		                <div class="content-wrap">
		                    <div class="content">

		                        <h2 class="title"><?php echo get_the_title(); ?></h2>
		                        <ul>
		                        	<?php 
			                        	if( $event_time ) { echo '<li><i class="ti-time"></i>'.esc_html( $event_time ).'</li>'; }
			                        	if( $event_location ) { echo '<li><i class="ti-location-pin"></i>'.esc_html( $event_location ).'</li>'; }
			                        	?>
		                        </ul>
		                        <div class="event-date" data-event-date="<?php echo esc_attr( $event_date ); ?>">
		                            <div class="item">
		                                <h2 class="days">65</h2>
		                                <span>Days</span>
		                            </div>
		                            <div class="item">
		                                <h2 class="hours">46</h2>
		                                <span>Hours</span>
		                            </div>
		                            <div class="item">
		                                <h2 class="mins">37</h2>
		                                <span>Minutes</span>
		                            </div>
		                            <div class="item">
		                                <h2 class="sec">60</h2>
		                                <span>Seconds</span>
		                            </div>
		                        </div>
		                        <?php if ( $button_link ) { ?>
		                        	<a href="<?php echo esc_url( $button_link ); ?>" class="theme-btn"><?php echo esc_html( $button_text ); ?></a>
		                        <?php } ?>
		                    </div>
		                </div>
		            </div>
		           <?php
						 	 endwhile;
						 	 endif;
						 	 wp_reset_postdata();
						 	?>
		        </div>
		    </div>
		</div>
		<?php } else { ?>
			<!-- start of event -->
			<div class="event-section-s2">
			    <div class="container">
			        <div class="event-slider">
			        	<?php 
									if ( $istiqbal_event->have_posts()) : while ( $istiqbal_event->have_posts()) : $istiqbal_event->the_post();
					        global $post;

					        $event_options = get_post_meta( get_the_ID(), 'event_options', true );
									$event_location = isset($event_options['location_address']) ? $event_options['location_address'] : '';
									$event_time = isset($event_options['event_time']) ? $event_options['event_time'] : '';
									$event_date = isset($event_options['event_date']) ? $event_options['event_date'] : '';
									$event_image2 = isset($event_options['event_image2']) ? $event_options['event_image2'] : '';

					      	$image_url = wp_get_attachment_url( $event_image2 );
			          	$image_alt = get_post_meta( $event_image2 , '_wp_attachment_image_alt', true);
				       
							  ?>
			            <div class="event-single-card">
			                <div class="image">
			                  <?php if( $image_url ) { echo '<img src="'.esc_url( $image_url ).'" alt="'.esc_url( $image_alt ).'">'; } ?>
			                </div>
			                <div class="content">
			                    <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
			                    <ul>
		                        <?php 
	                        	if( $event_time ) { echo '<li><i class="ti-time"></i>'.esc_html( $event_time ).'</li>'; }
	                        	if( $event_location ) { echo '<li><i class="ti-location-pin"></i>'.esc_html( $event_location ).'</li>'; }
	                        	?>
			                    </ul>
			                </div>
			            </div>
			             <?php
								 	 endwhile;
								 	 endif;
								 	 wp_reset_postdata();
								 	?>
			        </div>
			    </div>
			</div>
		<?php }
			// Return outbut buffer
			echo ob_get_clean();	
		}
	/**
	 * Render Event widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Site_Event() );