<?php
/**
 * Widget Name: ETeam - Kontakt Information List
 * Widget ID: eteam-kontakt-info
 * Description: A box widget for contact details and form
 * Author: ETeam.dk
 * Author URI: https://www.eteam.dk/
 */

class Eteam_Kontakt_Info_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'eteam-kontakt-info',
			esc_html__( 'ETeam - Kontakt Info', 'kickass' ),
			array(
				'description' => esc_html__( 'A custom kontakt information list.', 'kickass' )
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => esc_html__( 'Title', 'kickass' ),
				),
				'contact_list' => array(
					'type' 	=> 'repeater',
			        'label' => __( 'List' , 'kickass' ),
			        'item_name'  => __( 'Contact', 'kickass' ),
			        'item_label' => array(
			            'selector'     => "[id*='title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
			        'fields' => array(
			        	'list_title' => array(
							'type' 	=> 'text',
							'label' => esc_html__( 'Title', 'kickass' ),
						),
					    'content' => array(
							'type' 	=> 'tinymce',
							'label' => esc_html__( 'Content', 'kickass' ),
						),
					)
				),
				'min_height' => array(
			        'type' 	  => 'slider',
			        'label'	  => __( 'Choose a min height', 'kickass' ),
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
					'eteam-kontakt-info',
					KICKASS_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
			)
		);
	}
}
siteorigin_widget_register( 'eteam-kontakt-info', __FILE__, 'Eteam_Kontakt_Info_Widget' );