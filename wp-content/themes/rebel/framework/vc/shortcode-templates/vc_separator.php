<?php
extract(shortcode_atts(array(
    'el_width' => '',
    'style' => '',
    'margintop' => '',
    'marginbottom' => '',
    'accent_color' => '',
    'el_class' => ''
), $atts));

echo do_shortcode('[vc_text_separator style="'.$style.'" margintop="'.$margintop.'" marginbottom="'.$marginbottom.'" accent_color="'.$accent_color.'" el_width="'.$el_width.'" el_class="'.$el_class.'"]');