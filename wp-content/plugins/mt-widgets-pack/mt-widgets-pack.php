<?php

/*
Plugin Name: MThemes Widget Pack
Plugin URI: http://www.m-themes.eu
Description: Available custom widgets: Flickr Feed, Latest Projects, Latest Posts
Version: 1.1
Author: maarcin
Author URI: http://themeforest.net/user/maarcin
*/


// Add function to widgets_init
add_action( 'widgets_init', 'mt_load_widgets' );

// Register widget
function mt_load_widgets() {
	register_widget( 'mt_flickR_Widget' );
	register_widget( 'mt_LatestPosts_Widget' );
	register_widget( 'mt_LatestProjects_Widget' );
}

/**

	Flickr feed widget

**/

// Widget class
class mt_flickr_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
		parent::__construct(
				'mt_flickr_widget',
				__('MT Flickr Photos',
				'mthemes'),
				array('description' => __('Display Flickr photos', 'mthemes'))
		);
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/
		
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$flickrID = $instance['flickrID'];
		$postcount = $instance['postcount'];
		$display = $instance['display'];

		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

		// Display Flickr Photos
		 ?>
			
		<div id="flickr_badges" class="clearfix">
		
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickrID ?>"></script>

			<div class="clearfix"></div>
			
		</div>
		
		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
		
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Update Widget
	/*-----------------------------------------------------------------------------------*/
		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );

		// No need to strip tags
		$instance['postcount'] = $new_instance['postcount'];
		$instance['display'] = $new_instance['display'];
		
		return $instance;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget Settings
	/*-----------------------------------------------------------------------------------*/
		 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Flickr Photos',
			'flickrID' => '52617155@N08',
			'postcount' => '9',
			'display' => 'latest'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mthemes') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Flickr ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'mthemes') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
		</p>
		
		<!-- Postcount: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:', 'mthemes') ?></label>
			<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
			<?php for ( $i = 1; $i <= 9; $i += 1) { ?>
				<option value="<?php echo $i; ?>" <?php selected( $instance['postcount'], $i ); ?>><?php echo $i; ?></option>
			<?php } ?>
			</select>
		</p>
		
		<!-- Display: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'mthemes') ?></label>
			<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
				<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
				<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
			</select>
		</p>
			
		<?php
	}
}

/**

	Latest posts widget

**/

// Widget class
class mt_latestposts_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {
		parent::__construct(
				'mt_latestposts_widget',
				__('MT Latest Posts',
				'mthemes'),
				array('description' => __('Display latest posts', 'mthemes'))
		);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];

		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

			$args = array(
	            'posts_per_page' => $number,
	            'ignore_sticky_posts' => 1,
	            'post_type' => 'post',
	            'order' => 'DESC',
	            'orderby' => 'date'
	        );
		
	        $post_query = new WP_Query( $args );?>

			<ul class="lp-sidebar">

	        <?php
	        
	        if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post();

			$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-widget', true);

	        ?>
	        <!-- BEGIN post -->
			<li>
				<?php if (has_post_thumbnail()) { ?>
				<div class="lp-image">
					<img alt="<?php the_title(); ?>" src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" />
				</div>
				<?php } ?>
				<div class="lp-description clearfix">
					<h6><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
					<span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
				</div>
				<div class="clearfix"></div>
			</li>
			<!-- END post -->	
	        <?php endwhile; endif; wp_reset_postdata(); ?>
	        <!-- END post -->

	    	</ul>
		
		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Latest posts',
			'number' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','mthemes'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'mthemes' ); ?>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
			</label>
		</p>
			
		<?php
	}
}

/**

	Latest projects widget

**/

// Widget class
class mt_latestprojects_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {
		parent::__construct(
				'mt_latestprojects_widget',
				__('MT Latest Projects',
				'mthemes'),
				array('description' => __('Display latest projects', 'mthemes'))
		);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];

		// Before widget (defined by theme functions file)
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;

			$args = array(
	            'posts_per_page' => $number,
	            'ignore_sticky_posts' => 1,
	            'post_type' => 'portfolio',
	            'order' => 'DESC',
	            'orderby' => 'date'
	        );
		
	        $port_query = new WP_Query( $args ); ?>

			<ul class="lp-sidebar latest-projects-widget mt-gallery image-overlay">

	        <?php
	        if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post();

	        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-widget', true);

	        ?>
	        <!-- BEGIN project -->
			<li class="mt-gallery-item lightbox-image">
				<?php if (has_post_thumbnail()) { ?>
				<div class="latest-project-image lightbox-overlay">
					<a class="image-lightbox" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						<img alt="<?php the_title(); ?>" src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" />
						<div class="overlay-wrapper">
							<div class="overlay-content">
								<i class="glyphicon glyphicon-share-alt"></i>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
			</li>
			<!-- END project -->	
	        <?php endwhile; endif; wp_reset_postdata(); ?>
	        <!-- END project -->

	    	</ul>
		
		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML (important for text inputs)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget Settings
/*-----------------------------------------------------------------------------------*/	 
	
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title' => 'Latest projects',
			'number' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','mthemes'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'mthemes' ); ?>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
			</label>
		</p>
			
		<?php
	}
}

?>