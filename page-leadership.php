<?php get_header(); ?>
<?php if( !has_post_thumbnail() ) : ?>

	<div class="content no-featured">

<?php else : ?>

	<div class="content">

<?php endif; ?>

    <div class="post-inner wide">

        <div class="post-content">

<?php

    $query = array(
        'post_type' => 'leadership',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    $loop = new WP_Query( $query );

    if ( $loop -> have_posts() || is_single() ) :

    while ( $loop->have_posts() ) : $loop->the_post();

    ?>
    <div id="post-<?php the_ID(); ?>" class="single post card">

        <!-- background image set in CSS -->
        <div class="card--bg"></div>

            <div class="card--content">

                <div class="card--profile" style="background-image:url(<?php echo get_field('profile_photo'); ?>)"></div>

                <div class="card--title">

                    <h1><?php the_title(); ?>, <?php echo get_field("position"); ?></h1>

                </div>

				<?php the_content(); ?>

                <div class="card--contact">

					<a href="mailto:<?php echo get_field('email_address'); ?>"><?php echo get_field('email_address'); ?></a>

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
