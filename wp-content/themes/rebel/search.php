<?php get_header(); ?>
<div class="page-area clearfix page-sidebar-right">

    <?php
        // function that contains title for this page
        mt_page_func_header();
    ?>

    <div class="content container">
        <div class="row">

            <div class="sidebar-inner-content col-md-9">

                <?php 
                    // set page to load all returned results
                    global $query_string;
                    query_posts( $query_string . '&posts_per_page=-1' );
                    if( have_posts() ) : 
                ?>   
                <h4><?php _e('Pages:', 'mthemes'); ?></h4>
                <div class="list-unstyled">
                    <ul>
                    <?php
                        $i = 0;
                        while( have_posts() ) : the_post(); if( $post->post_type == 'page' ) {
                            $i++; ?>
                                <li><h5><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <?php the_title(); ?></a></h5></li> 
                            <?php }
                        endwhile;
                        if( $i == 0 ) { ?>
                            <p><?php _e('No pages match the search terms', 'mthemes'); ?></p>
                        <?php }
                    ?>
                    </ul>
                </div>

                <div class="mt-hr clearfix hr-20"></div>

                <h4><?php _e('Posts:', 'mthemes'); ?></h4>
                <div class="list-unstyled">
                    <ul>
                    <?php
                        $i = 0;
                        while( have_posts() ) : the_post();
                            if( $post->post_type == 'post' ) {
                            $i++; ?>
                                <li><h5><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <?php the_title(); ?></a></h5></li> 
                            <?php }
                        endwhile;
                        if( $i == 0 ) { ?>
                            <p><?php _e('No posts match the search terms', 'mthemes'); ?></p>
                        <?php }
                    ?>
                    </ul>
                </div>

                <div class="mt-hr clearfix hr-20"></div>

                <h4><?php _e('Portfolio items:', 'mthemes'); ?></h4>
                <div class="list-unstyled">
                    <ul>
                    <?php
                        $i = 0;
                        while( have_posts() ) : the_post(); if( $post->post_type == 'portfolio' ) {
                            $i++; ?>
                                <li><h5><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <?php the_title(); ?></a></h5></li> 
                            <?php }
                        endwhile;
                        if( $i == 0 ) { ?>
                            <p><?php _e('No portfolio items match the search terms', 'mthemes'); ?></p>
                        <?php }
                    ?>
                    </ul>
                </div>

                <div class="mt-hr clearfix hr-20"></div>

                <h4><?php _e('Team members:', 'mthemes'); ?></h4>
                <div class="list-unstyled">
                    <ul>
                    <?php
                        $i = 0;
                        while( have_posts() ) : the_post(); if( $post->post_type == 'teammembers' ) {
                            $i++; ?>
                                <li><h5><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <?php the_title(); ?></a></h5></li> 
                            <?php }
                        endwhile;
                        if( $i == 0 ) { ?>
                            <p><?php _e('No team members match the search terms', 'mthemes'); ?></p>
                        <?php }
                    ?>
                    </ul>
                </div>

                <?php else : ?>
                <div class="alert alert-danger">
                    <strong>Oops!</strong>
                    <?php _e('Sorry, nothing found for ', 'mthemes'); the_search_query(); ?>. <?php _e('Maybe try another keyword?', 'mthemes'); ?>
                </div>

                <form action="<?php echo home_url(); ?>/" id="searchform" class="sidebar-search-form" method="get">
                    <fieldset>
                        <input type="text" id="s" name="s" value="<?php _e('To search type and hit enter', 'mthemes') ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                    </fieldset>
                </form>
                <?php endif; ?>

            </div><!-- / .sidebar-inner-content -->

            <aside class="sidebar sidebar-right col-md-3" role="complementary">
                <div class="sidebar-inner">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar')) : else : ?>
                        <div class="widget">
                            <p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>
            
        </div>
    </div><!-- / .content -->
    
</div><!-- / .content-area -->
<?php get_footer(); ?>