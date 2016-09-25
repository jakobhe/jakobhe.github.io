<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new mthemes_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<div id="mthemes-popup">

	<div id="mthemes-shortcode-wrap">

		<div id="mthemes-sc-form-wrap">

			<?php
			$select_shortcode = array(
				'select' => 'Choose a Shortcode',				
				'mt_shortcode_badge' => 'Badge',
				'mt_shortcode_button' => 'Button',											
				'mt_shortcode_clear' => 'Clear',				
				'mt_shortcode_code' => 'Code',
				'mt_shortcode_customlist' => 'Custom list',
				'mt_shortcode_emphasis' => 'Emphasis',
				'mt_shortcode_fontawesome' => 'Font Awesome',
				'mt_shortcode_fastack' => 'Font Awesome stack',
				'mt_shortcode_glyphicon' => 'Glyphicon',				
				'mt_shortcode_header' => 'Header',
				'mt_shortcode_image' => 'Image',
				'mt_shortcode_label' => 'Label',				
				'mt_shortcode_lightbox' => 'Lightbox',				
				'mt_shortcode_milestone' => 'Milestone',				
				'mt_shortcode_piechart' => 'Piechart',
				'mt_shortcode_popover' => 'Popover',				
				'mt_shortcode_portfoliodetails' => 'Portfolio details',				
				'mt_shortcode_progress' => 'Progress',								
				'mt_shortcode_socialicons' => 'Social icons',
				'mt_shortcode_table_wrap' => 'Table wrap',						
				'mt_shortcode_tooltip' => 'Tooltip',
				'mt_shortcode_vimeo' => 'Vimeo',			
				'mt_shortcode_well' => 'Well',				
				'mt_shortcode_youtube' => 'YouTube',


				// 'mt_shortcode_accordions' => 'Accordion',
				// 'mt_shortcode_alert' => 'Alert',
				// 'mt_shortcode_blockquote' => 'Blockquote',
				// 'mt_shortcode_blog' => 'Blog',
				// 'mt_shortcode_clientscarousel' => 'Clients carousel',
				// 'mt_shortcode_clientsgrid' => 'Clients grid',
				// 'mt_shortcode_gmap' => 'Google map',
				// 'mt_shortcode_latestposts' => 'Latest posts',
				// 'mt_shortcode_panel' => 'Panel',
				// 'mt_shortcode_portfolio' => 'Portfolio',
				// 'mt_shortcode_portfoliocarousel' => 'Portfolio carousel',
				// 'mt_shortcode_pricing' => 'Pricing column',
				// 'mt_shortcode_service' => 'Service',
				// 'mt_shortcode_flexslider' => 'Slider: FlexSlider',
				// 'mt_shortcode_tabs' => 'Tabs',
				// 'mt_shortcode_teammembers' => 'Team members',
				// 'mt_shortcode_teamcarousel' => 'Team members carousel',
				// 'mt_shortcode_testimonial' => 'Testimonial',
				// 'mt_shortcode_testslider' => 'Testimonial slider',
				// 'mt_shortcode_toggle' => 'Toggle',
				
			);
			?>
			<table id="mthemes-sc-form-table" class="mthemes-shortcode-selector">
				<tbody>
					<tr class="form-row">
						<td class="label">Choose Shortcode</td>
						<td class="field">
							<div class="mthemes-form-select-field">
							<div class="mthemes-shortcodes-arrow"></div>
								<select name="mthemes_select_shortcode" id="mthemes_select_shortcode" class="mthemes-form-select mthemes-input">
									<?php foreach($select_shortcode as $shortcode_key => $shortcode_value): ?>
									<?php if($shortcode_key == $popup): $selected = 'selected="selected"'; else: $selected = ''; endif; ?>
									<option value="<?php echo $shortcode_key; ?>" <?php echo $selected; ?>><?php echo $shortcode_value; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<form method="post" id="mthemes-sc-form">

				<table id="mthemes-sc-form-table">

					<?php echo $shortcode->output; ?>

					<tbody class="mthemes-sc-form-button">
						<tr class="form-row">
							<td class="field"><a href="#" class="mthemes-insert">Insert Shortcode &nbsp;<i class="fa fa-check"></i> </a></td>
						</tr>
					</tbody>

				</table>
				<!-- /#mthemes-sc-form-table -->

			</form>
			<!-- /#mthemes-sc-form -->

		</div>
		<!-- /#mthemes-sc-form-wrap -->

		<div class="clear"></div>

	</div>
	<!-- /#mthemes-shortcode-wrap -->

</div>
<!-- /#mthemes-popup -->

</body>
</html>