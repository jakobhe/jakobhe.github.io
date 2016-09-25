<?php
/**
 * For future use, how to get things done with custom template
 *
 */

add_action('vc_load_default_templates_action','my_custom_template_for_vc');
function my_custom_template_for_vc() {
    $data               = array();
    $data['name']       = __( 'Custom template', 'custom_template_for_vc' );
    $data['image_path'] = preg_replace( '/\s/', '%20', 'http://placehold.it/114x154' ); // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'custom_template_for_vc_custom_template';
    $data['content']    = <<<CONTENT
        [vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_message color="alert-info" style="rounded"]I am message box. Click edit button to change this text.[/vc_message][/vc_column][/vc_row]
CONTENT;
 
    vc_add_default_templates( $data );
}

?>