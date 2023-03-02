<?php
/**
 * Kick Ass Theme Custom CSS
 *
 * @package Kick_Ass_Theme
 */

/**
 * Theme Option Page Example
 */
function kickass_admin_custom_css_theme_menu() {
  add_theme_page( 'Custom CSS', 'Custom CSS', 'manage_options', 'kickass_custom_css.php', 'kickass_admin_custom_css_theme_page');
}
add_action('admin_menu', 'kickass_admin_custom_css_theme_menu');

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */
function kickass_admin_custom_css_theme_page() {
?>
    <div class="wrap ka-custom-editor-section">
      	<h1><?php _e( 'Custom CSS', 'kickasss' ) ?></h1>
      	<form method="post" enctype="multipart/form-data" action="options.php" onsubmit="return getCustomEditorContent()">
	        <?php settings_fields('kickass_custom_css_theme_options'); ?>
	        <?php do_settings_sections('kickass_custom_css.php'); ?>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Save CSS', 'kickass' ) ?>" />
            </p>
      	</form>
    </div>
<?php
}

/**
 * Register the settings to use on the theme options page
 */
function kickass_custom_css_register_settings() {

    // Register the settings with Validation callback
    register_setting( 'kickass_custom_css_theme_options', 'kickass_custom_css_theme_options', 'kickass_custom_css_validate_settings' );

    // Add settings section
    add_settings_section( 'ka_custom_css_stylesheet_section', 'Stylesheet', 'kickass_custom_css_display_section', 'kickass_custom_css.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'textarea',
      'id'        => 'ka_custom_editor_box',
      'name'      => 'ka_custom_editor_box',
      'std'       => '',
      'label_for' => 'ka_custom_editor_box',
      'class'     => ' css'
    );

    add_settings_field( 'example_textbox', '', 'kickass_custom_css_display_setting', 'kickass_custom_css.php', 'ka_custom_css_stylesheet_section', $field_args );
}
add_action( 'admin_init', 'kickass_custom_css_register_settings' );

/**
 * Function to add extra text to display on each section
 */
function kickass_custom_css_display_section($section){

}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function kickass_custom_css_display_setting( $args ) {

	// Extract arguments
    extract( $args );
    $option_name = 'kickass_custom_css_theme_options';
    $options = get_option( $option_name );

    switch ( $type ) {
          case 'textarea':
              $options[$id] = isset( $options[$id] ) ? $options[$id] : null;
              $options[$id] = stripslashes( $options[$id] );
              $options[$id] = esc_attr( $options[$id] );
              echo "<pre><code id='ka_custom_editor_box_editable' class='$class' contenteditable='true'>".$options[$id]."</code></pre>";
              echo "<textarea style='display: none;' name='" . $option_name . "[$id]' id='$id' spellcheck='false'>".$options[$id]."</textarea>";
          break;
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function kickass_custom_css_validate_settings( $input ) {

	// Trim words
  	foreach($input as $k => $v) {
    	$newinput[$k] = trim($v);
  	}

  return $newinput;
}