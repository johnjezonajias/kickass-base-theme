<?php
/**
 * Widget Name: ETeam - Kontakt Box
 * Widget ID: eteam-kontakt-box
 * Description: A box widget for google map container
 * Author: ETeam.dk
 * Author URI: https://www.eteam.dk/
 */

class Eteam_Kontakt_Box_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'eteam-kontakt-box',
			esc_html__( 'ETeam - Kontakt Box', 'kickass' ),
			array(
				'description' => esc_html__( 'Kontakt Box with title, content and background color.', 'kickass' )
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => esc_html__( 'Title', 'kickass' ),
				),
				'content'  => array(
					'type' 	=> 'tinymce',
					'label' => esc_html__( 'Content', 'kickass' ),
				),
			    'min_height' => array(
			        'type' 	  => 'slider',
			        'label'   => __( 'Choose a min height', 'kickass' ),
			        'default' => 495,
			        'min' 	  => 300,
			        'max' 	  => 680,
			        'integer' => true
			    )
			),
			KICKASS_WIDGET_FOLDER_URI
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'eteam-kontakt-box',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
			)
		);
	}
}
siteorigin_widget_register( 'eteam-kontakt-box', __FILE__, 'Eteam_Kontakt_Box_Widget' );