<?php get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<section class="bg-bg-dark">
    <div class="container py-16 sm:py-24">
        <h2 class="text-center"><?php _e('Restaurant', 'bowlingcentrum'); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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

<!-- Post end -->
<?php include get_template_directory() . '/assets/post-end.php'; ?>

<?php include get_template_directory() . '/assets/usp.php'; ?>


<?php get_footer(); ?>