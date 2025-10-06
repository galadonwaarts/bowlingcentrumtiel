<?php
// template name: Home
get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<!-- Arrangementen -->
<section class="bg-bg-dark">
    <div class="container grid py-16 sm:py-24">
        <div class="">
            <h2 class="text-center"><?php _e('Arrangementen', 'bowlingcentrum'); ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
            $arrangementen_selection = get_field('arrangementen_selection');

            if ($arrangementen_selection) {
                foreach ($arrangementen_selection as $arrangement) {
                    $post = is_object($arrangement) ? $arrangement : get_post($arrangement);
                    setup_postdata($post);

                    include get_template_directory() . '/assets/arrangement.php';
                }
                wp_reset_postdata();
            } else {
                // Fallback: toon alle parent-arrangementen op menu_order
                $q = new WP_Query([
                    'post_type'      => 'arrangement',
                    'post_parent'    => 0,
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'post_status'    => 'publish',
                ]);

                while ($q->have_posts()) {
                    $q->the_post();

                    include get_template_directory() . '/assets/arrangement.php';
                }
                wp_reset_postdata();
                wp_reset_query();
            }
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

<!-- Restaurant -->
<section class="bg-bg-dark">
    <div class="container py-16 sm:py-24 grid">
        <div class="">
            <h2 class="text-center"><?php _e('Restaurant', 'bowlingcentrum'); ?></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $new_loop = new WP_Query(array(
                'post_type' => 'restaurant',
            ));
            ?>
            <?php if ($new_loop->have_posts()) : ?>
                <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>
                    <?php include get_template_directory() . '/assets/restaurant.php'; ?>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_query(); ?>
        </div>


    </div>

</section>



<!-- USP (Unique selling points) section -->
<?php include get_template_directory() . '/assets/usp.php'; ?>

<!-- Instagram feed section -->
<?php if (shortcode_exists('instagram-feed')) : ?>
<section class=" bg-bg-dark py-16 sm:py-28">
    <div class="container">
        <h2 class="text-center font-normal sm:mb-20"><?php _e('Kom gezellig langs!', 'bowlingcentrum'); ?></h2>
        <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
    </div>
</section>
<?php endif; ?>

<!-- CTA section -->
<?php include get_template_directory() . '/assets/cta.php'; ?>


<?php get_footer(); ?>