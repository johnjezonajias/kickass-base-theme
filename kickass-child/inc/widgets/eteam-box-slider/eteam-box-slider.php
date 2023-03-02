<?php 
 /**
 * Widget Name: ETeam - Box Slider
 * Widget ID: eteam-box-slider
 * Description: Box slider widget to show recent projects
 * Author: ETeam.dk
 * Author URI: https://www.eteam.dk/
 */

class Eteam_Box_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'eteam-box-slider',
			esc_html__( 'ETeam - Box Slider', 'kickass' ),
			array(
				'description' => esc_html__( 'A custom widget for this theme.', 'kickass' )
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => esc_html__( 'Slider Title', 'kickass' ),
				),
				'box-slider' => array(
			        'type' => 'repeater',
			        'label' => __( 'Box Sliders' , 'kickass' ),
			        'item_name'  => __( 'Slider', 'kickass' ),
			        'item_label' => array(
			            'selector'     => "[id*='slide-title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
			        'fields' => array(
			        	'slide-title' => array(
							'type' 	=> 'text',
							'label' => esc_html__( 'Slider Title', 'kickass' ),
						),
						'slide-url' => array(
							'type' 	=> 'link',
							'label' => esc_html__( 'Page Link', 'kickass' ),
						),
						'slide-tab' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __('You want to make the link open in new tab?', 'kickass'),
						),
						'slide-btn' => array(
							'type' 	=> 'text',
							'label' => esc_html__( 'Button Text', 'kickass' ),
						),
					    'image' => array(
					        'type' 		=> 'media',
					        'label' 	=> esc_html__( 'Choose Image', 'kickass' ),
					        'choose' 	=> esc_html__( 'Choose image', 'kickass' ),
					        'update' 	=> esc_html__( 'Set image', 'kickass' ),
					        'library'	=> 'image',
					        'fallback' 	=> true
					    )
			        )
			    ),
			),
			KICKASS_WIDGET_FOLDER_URI
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'eteam-box-slider',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/js/jquery.bxslider.min.js',
					array( 'jquery' ),
					'',
					true
				),
				array(
					'eteam-box-slider-main',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/js/scripts.js',
					array( 'jquery' ),
					'',
					true
				)
			)
		);

		$this->register_frontend_styles(
			array(
				array(
					'eteam-box-slider',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/jquery.bxslider.min.css',
					array(),
					KICKASS_VERSION
				),
				array(
					'eteam-box-slider-main',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
			)
		);
	}
}
siteorigin_widget_register( 'eteam-box-slider', __FILE__, 'Eteam_Box_Slider_Widget' );