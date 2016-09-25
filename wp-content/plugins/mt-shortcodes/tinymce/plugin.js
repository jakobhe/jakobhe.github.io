(function($) {
    tinymce.PluginManager.add('mthemes_button', function(ed, url) {
        ed.addCommand("mthemesPopup", function ( a, params )
        {
            var popup = 'mt_shortcode_generator';

            if(typeof params != 'undefined' && params.identifier) {
                popup = params.identifier;
            }
            
            jQuery('#TB_window').hide();

            // load thickbox
            tb_show("MT Shortcodes", ajaxurl + "?action=mthemes_shortcodes_popup&popup=" + popup + "&width=" + 800);
        });

        // Add a button that opens a window
        ed.addButton('mthemes_button', {
            text: '',
            icon: true,
            image: MthemesShortcodes.plugin_folder + '/tinymce/images/icon.png',
            cmd: 'mthemesPopup'
        });
    });
})(jQuery);