<?php get_header(); ?>

<?php if( !has_post_thumbnail() ) : ?>

	<div class="content no-featured">

<?php else : ?>

	<div class="content">

<?php endif; ?>

<div class="post single-post">

    <div class="post-inner">

        <h1 class="post-title"><?php echo the_title(); ?></h1>

        <div class="post-content">

            <?php

                $query = array(
                    'post_type' => 'ministries',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );

                $loop = new WP_Query( $query );

                if ( $loop -> have_posts() || is_single() ) :

                while ( $loop->have_posts() ) : $loop->the_post();

                ?>
                <div id="post-<?php the_ID(); ?>" class="single post ministry">

                    
                <?php if( has_post_thumbnail() ) : ?>

                    <div class="ministry--img" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></div>     

                <!-- </div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fffffe" d="M337.454 232c33.599 0 61.092-27.002 61.092-60 0-32.997-27.493-60-61.092-60s-61.09 27.003-61.09 60c0 32.998 27.491 60 61.09 60zm-162.908 0c33.599 0 61.09-27.002 61.09-60 0-32.997-27.491-60-61.09-60s-61.092 27.003-61.092 60c0 32.998 27.493 60 61.092 60zm0 44C126.688 276 32 298.998 32 346v54h288v-54c0-47.002-97.599-70-145.454-70zm162.908 11.003c-6.105 0-10.325 0-17.454.997 23.426 17.002 32 28 32 58v54h128v-54c0-47.002-94.688-58.997-142.546-58.997z"/></svg></div> -->
                        
                <?php endif; ?>


                        <div class="ministry--content">

                            <div class="ministry--title">

                                <h2><?php the_title(); ?></h2>

                            </div>

                            <span class="ministry--text">

                                <?php the_content(); ?>

                            </span>

                            <div class="ministry--contact">

            					<a href="<?php echo get_field('email_address'); ?>"><?php echo get_field('email_address'); ?></a>

            				</div>

                        </div>

                    </div>
            <?php endwhile; wp_reset_postdata(); ?>
                <!-- post navigation -->
            <?php else: ?>
                <h2>There's nothing here</h2>
            <?php endif; ?>

        </div> <!-- .post-content -->

    </div> <!-- .post-inner -->

</div> <!-- .content -->

<?php get_footer(); ?>
