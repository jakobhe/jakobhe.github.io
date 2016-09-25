// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    window.mthemes_tb_height = (92 / 100) * jQuery(window).height();
    window.mt_theme_shortcodes_height = (71 / 100) * jQuery(window).height();
    if(window.mt_theme_shortcodes_height > 550) {
        window.mt_theme_shortcodes_height = (74 / 100) * jQuery(window).height();
    }

    jQuery(window).resize(function() {
        window.mthemes_tb_height = (92 / 100) * jQuery(window).height();
        window.mt_theme_shortcodes_height = (71 / 100) * jQuery(window).height();

        if(window.mt_theme_shortcodes_height > 550) {
            window.mt_theme_shortcodes_height = (74 / 100) * jQuery(window).height();
        }
    });

    mthemes_shortcodes = {
    	loadVals: function()
    	{
    		var shortcode = $('#_mthemes_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.mthemes-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('mthemes_', ''),		// gets rid of the mthemes_ prefix
    				re = new RegExp("{{"+id+"}}","g");
                    var value = input.val();
                    if(value == null) {
                      value = '';
                    }
    			uShortcode = uShortcode.replace(re, value);
    		});

    		// adds the filled-in shortcode as hidden input
    		$('#_mthemes_ushortcode').remove();
    		$('#mthemes-sc-form-table').prepend('<div id="_mthemes_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_mthemes_cshortcode').text(),
    			pShortcode = '';

    			if(shortcode.indexOf("<li>") < 0) {
    				shortcodes = '<br />';
    			} else {
    				shortcodes = '';
    			}

    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
                if($(this).find('#mthemes_slider_type').length >= 1) {
                    if($(this).find('#mthemes_slider_type').val() == 'image') {
                        rShortcode = '[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]';
                    } else if($(this).find('#mthemes_slider_type').val() == 'video') {
                        rShortcode = '[slide type="{{slider_type}}"]{{video_content}}[/slide]';
                    }
                }
    			$('.mthemes-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('mthemes_', '')		// gets rid of the mthemes_ prefix
    					re = new RegExp("{{"+id+"}}","g");
                        var value = input.val();
                        if(value == null) {
                          value = '';
                        }
    				rShortcode = rShortcode.replace(re, input.val());
    			});

    			if(shortcode.indexOf("<li>") < 0) {
    				shortcodes = shortcodes + rShortcode + '<br />';
    			} else {
    				shortcodes = shortcodes + rShortcode;
    			}
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_mthemes_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_mthemes_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_mthemes_ushortcode').html().replace('{{child_shortcode}}', shortcodes);
            
    		// add updated parent shortcode
    		$('#_mthemes_ushortcode').remove();
    		$('#mthemes-sc-form-table').prepend('<div id="_mthemes_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false,
                onAdd: function(row) {
                    // Get Upload ID
                    var prev_upload_id = jQuery(row).prev().find('.mthemes-upload-button').data('upid');
                    var new_upload_id = prev_upload_id + 1;
                    jQuery(row).find('.mthemes-upload-button').attr('data-upid', new_upload_id);

                    // activate chosen
                    jQuery('.mthemes-form-multiple-select').chosen({
                        width: '100%',
                        placeholder_text_multiple: 'Select Options or Leave Blank for All'
                    });

                    // activate color picker
                    jQuery('.wp-color-picker-field').wpColorPicker({
                        change: function(event, ui) {
                            mthemes_shortcodes.loadVals();
                            mthemes_shortcodes.cLoadVals();
                        }
                    });

                    // changing slide type
                    var type = $(row).find('#mthemes_slider_type').val();

                    if(type == 'video') {
                        $(row).find('#mthemes_image_content, #mthemes_image_url, #mthemes_image_target, #mthemes_image_lightbox').closest('li').hide();
                        $(row).find('#mthemes_video_content').closest('li').show();

                        $(row).find('#_mthemes_cshortcode').text('[slide type="{{slider_type}}"]{{video_content}}[/slide]');
                    }

                    if(type == 'image') {
                        $(row).find('#mthemes_image_content, #mthemes_image_url, #mthemes_image_target, #mthemes_image_lightbox').closest('li').show();
                        $(row).find('#mthemes_video_content').closest('li').hide();

                        $(row).find('#_mthemes_cshortcode').text('[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]');   
                    }

                    mthemes_shortcodes.loadVals();
                    mthemes_shortcodes.cLoadVals();
                }
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row',
                cancel: 'div.mt_admin_iconpicker, input, select, textarea, a'
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				mthemesPopup = $('#mthemes-popup');

            tbWindow.css({
                height: window.mthemes_tb_height,
                width: mthemesPopup.outerWidth(),
                marginLeft: -(mthemesPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: window.mthemes_tb_height,
				overflow: 'auto', // IMPORTANT
				width: mthemesPopup.outerWidth()
			});

            tbWindow.show();

			$('#mthemes-popup').addClass('no_preview');
            $('#mthemes-sc-form-wrap #mthemes-sc-form').height(window.mt_theme_shortcodes_height);
    	},
    	load: function()
    	{
    		var	mthemes = this,
    			popup = $('#mthemes-popup'),
    			form = $('#mthemes-sc-form', popup),
    			shortcode = $('#_mthemes_shortcode', form).text(),
    			popupType = $('#_mthemes_popup', form).text(),
    			uShortcode = '';
    		
            // if its the shortcode selection popup
            if($('#_mthemes_popup').text() == 'shortcode-generator') {
                $('.mthemes-sc-form-button').hide();
            }

    		// resize TB
    		mthemes_shortcodes.resizeTB();
    		$(window).resize(function() { mthemes_shortcodes.resizeTB() });
    		
    		// initialise
            mthemes_shortcodes.loadVals();
    		mthemes_shortcodes.children();
    		mthemes_shortcodes.cLoadVals();
    		
    		// update on children value change
    		$('.mthemes-cinput', form).live('change', function() {
    			mthemes_shortcodes.cLoadVals();
    		});
    		
    		// update on value change
    		$('.mthemes-input', form).live('change', function() {
    			mthemes_shortcodes.loadVals();
    		});

            // change shortcode when a user selects a shortcode from choose a dropdown field
            $('#mthemes_select_shortcode').change(function() {
                var name = $(this).val();
                var label = $(this).text();
                
                if(name != 'select') {
                    tinyMCE.activeEditor.execCommand("mthemesPopup", false, {
                        title: label,
                        identifier: name
                    });

                    $('#TB_window').hide();
                }
            });

            // activate chosen
            $('.mthemes-form-multiple-select').chosen({
                width: '100%',
                placeholder_text_multiple: 'Choose category'
            });

            // update upload button ID
            jQuery('.mthemes-upload-button:not(:first)').each(function() {
                var prev_upload_id = jQuery(this).data('upid');
                var new_upload_id = prev_upload_id + 1;
                jQuery(this).attr('data-upid', new_upload_id);
            });
    	}
	}
    
    // run
    $('#mthemes-popup').livequery(function() {
        mthemes_shortcodes.load();

        $('#mthemes-popup').closest('#TB_window').addClass('mthemes-shortcodes-popup');

        $('#mthemes_video_content').closest('li').hide();

            // activate color picker
            $('.wp-color-picker-field').wpColorPicker({
                change: function(event, ui) {
                    setTimeout(function() {
                        mthemes_shortcodes.loadVals();
                        mthemes_shortcodes.cLoadVals();
                    },
                    1);
                }
            });
    });

    // when insert is clicked
    $('.mthemes-insert').live('click', function() {                        
        if(window.tinyMCE)
        {
            window.tinyMCE.activeEditor.execCommand('mceInsertContent', false, $('#_mthemes_ushortcode').html());
            tb_remove();
        }
    });

    //tinymce.init(tinyMCEPreInit.mceInit['mthemes_content']);
    //tinymce.execCommand('mceAddControl', true, 'mthemes_content');
    //quicktags({id: 'mthemes_content'});

    // activate upload button
    $('.mthemes-upload-button').live('click', function(e) {
	    e.preventDefault();

        upid = $(this).attr('data-upid');

        if($(this).hasClass('remove-image')) {
            $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', '').hide();
            $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', '');
            $('.mthemes-upload-button[data-upid="' + upid + '"]').text('Upload').removeClass('remove-image');

            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select Image',
            },
	        frame: 'post',
            multiple: false  // Set to true to allow multiple files to be selected
        });

	    file_frame.open();

        file_frame.on( 'select', function() {
            var selection = file_frame.state().get('selection');
                selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
                $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

                mthemes_shortcodes.loadVals();
                mthemes_shortcodes.cLoadVals();
            });

            $('.mthemes-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
            $('.media-modal-close').trigger('click');
        });

	    file_frame.on( 'insert', function() {
		    var selection = file_frame.state().get('selection');
		    var size = jQuery('.attachment-display-settings .size').val();

		    selection.map( function( attachment ) {
			    attachment = attachment.toJSON();

			    if(!size) {
				    attachment.url = attachment.url;
			    } else {
				    attachment.url = attachment.sizes[size].url;
			    }

			    $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
			    $('.mthemes-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

			    mthemes_shortcodes.loadVals();
			    mthemes_shortcodes.cLoadVals();
		    });

		    $('.mthemes-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
		    $('.media-modal-close').trigger('click');
	    });
    });

    $('.mt_admin_iconpicker span').live('click', function(e) {
        e.preventDefault();

        var iconWithPrefix = $(this).attr('class');
        var fontName = $(this).attr('data-name');

        if($(this).hasClass('active')) {
            $(this).parent().find('.active').removeClass('active');

            $(this).parent().parent().find('input').attr('value', '');
        } else {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            $(this).parent().parent().find('input').attr('value', fontName);
        }

        mthemes_shortcodes.loadVals();
        mthemes_shortcodes.cLoadVals();
    });

    // table shortcode
    $('#mthemes-sc-form-table .mthemes-insert').live('click', function(e) {
        e.stopPropagation();

        var shortcodeType = $('#mthemes_select_shortcode').val();

        if(shortcodeType == 'table') {
            var type = $('#mthemes-sc-form-table #mthemes_type').val();
            var columns = $('#mthemes-sc-form-table #mthemes_columns').val();

            var text = '<div class="table-' + type + '"><table width="100%"><thead><tr>';

            for(var i=0;i<columns;i++) {
                text += '<th>Column ' + (i + 1) + '</th>';
            }

            text += '</tr></thead><tbody>';

            for(var i=0;i<columns;i++) {
                text += '<tr>';
                if(columns >= 1) {
                    text += '<td>Item #' + (i + 1) + '</td>';
                }
                if(columns >= 2) {
                    text += '<td>Description</td>';
                }
                if(columns >= 3) {
                    text += '<td>Discount:</td>';
                }
                if(columns >= 4) {
                    text += '<td>$' + (i + 1) + '.00</td>';
                }
                text += '</tr>';
            }

            text += '<tr>';
            
            if(columns >= 1) {
                text += '<td><strong>All Items</strong></td>';
            }
            if(columns >= 2) {
                text += '<td><strong>Description</strong></td>';
            }
            if(columns >= 3) {
                text += '<td><strong>Your Total:</strong></td>';
            }
            if(columns >= 4) {
                text += '<td><strong>$10.00</strong></td>';
            }
            text += '</tr>';
            text += '</tbody></table></div>';

            if(window.tinyMCE)
            {
                window.tinyMCE.activeEditor.execCommand('mceInsertContent', false, text);
                tb_remove();
            }
        }
    });

    // slider shortcode
    $('#mthemes_slider_type').live('change', function(e) {
        e.preventDefault();

        var type = $(this).val();
        if(type == 'video') {
            $(this).parents('ul').find('#mthemes_image_content, #mthemes_image_url, #mthemes_image_target, #mthemes_image_lightbox').closest('li').hide();
            $(this).parents('ul').find('#mthemes_video_content').closest('li').show();

            $('#_mthemes_cshortcode').text('[slide type="{{slider_type}}"]{{video_content}}[/slide]');
        }

        if(type == 'image') {
            $(this).parents('ul').find('#mthemes_image_content, #mthemes_image_url, #mthemes_image_target, #mthemes_image_lightbox').closest('li').show();
            $(this).parents('ul').find('#mthemes_video_content').closest('li').hide();

            $('#_mthemes_cshortcode').text('[slide type="{{slider_type}}" link="{{image_url}}" linktarget="{{image_target}}" lightbox="{{image_lightbox}}"]{{image_content}}[/slide]');   
        }
    });

    $('.mthemes-add-video-shortcode').live('click', function(e) {
        e.preventDefault();

        var shortcode = $(this).attr('href');
        var content = $(this).parents('ul').find('#mthemes_video_content');
        
        content.val(content.val() + shortcode);
    });

    $('#mthemes-popup textarea').live('focus', function() {
        var text = $(this).val();

        if(text == 'Your Content Goes Here') {
            $(this).val('');
        }
    });

    $('.mthemes-gallery-button').live('click', function(e) {
	    var gallery_file_frame;

        e.preventDefault();

	    alert('To add images to this post or page for attachments layout, navigate to "Upload Files" tab in media manager and upload new images.');

        gallery_file_frame = wp.media.frames.gallery_file_frame = wp.media({
            title: 'Attach Images to Post/Page',
            button: {
                text: 'Go Back to Shortcode',
            },
            frame: 'post',
            multiple: true  // Set to true to allow multiple files to be selected
        });

	    gallery_file_frame.open();

        $('.media-menu-item:contains("Upload Files")').trigger('click');

        gallery_file_frame.on( 'select', function() {
            $('.media-modal-close').trigger('click');

            mthemes_shortcodes.loadVals();
            mthemes_shortcodes.cLoadVals();
        });
    });
});