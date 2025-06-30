<?php get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<section class="bg-bg-dark">
    <div class="container py-16 sm:py-24">
        <h2 class="text-center"><?php _e('Bekijk de arrangementen', 'bowlingcentrum'); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php 
            $new_loop = new WP_Query(array(
                'post_type' => 'arrangement',
                'post_parent' => 0, // Only get top-level posts (no children)
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($new_loop->have_posts()) : 
                while ($new_loop->have_posts()) : 
                    $new_loop->the_post();
                    include get_template_directory() . '/assets/arrangement.php';
                    wp_reset_postdata(); // Reset post data after each iteration
                endwhile;
            endif;
            wp_reset_query(); // Reset the main query
            ?>
        </div>
    </div>
</section>


<!-- Button section -->
<section class="bg-bg-dark">
    <div class="container flex justify-center flex-wrap gap-6 lg:gap-10">
        <?php if (get_field('g_phone', 'option')) : ?>
            <a href="tel:<?php the_field('g_phone', 'option'); ?>" class="btn accent-color uppercase w-full md:w-fit">Bel <?php the_field('g_phone', 'option'); ?></a>
        <?php endif; ?>
        <?php
$link = get_field('header_booking_link', 'option');
if( $link ):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="btn accent-color  uppercase w-full md:w-fit" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>

    </div>
</section>

<!-- USP (Unique selling points) section -->
<?php include get_template_directory() . '/assets/usp.php'; ?>

<!-- CTA section -->
<?php include get_template_directory() . '/assets/cta.php'; ?>

<?php get_footer(); ?>