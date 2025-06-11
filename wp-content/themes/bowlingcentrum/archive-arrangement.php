<?php get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<section class="bg-black">
    <div class="container py-16 sm:py-24">
        <h2 class="text-center">Bekijk de arrangementen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php $new_loop = new WP_Query(array(
                'post_type' => 'arrangement',
            ));
            ?>
            <?php if ($new_loop->have_posts()) : ?>
                <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>
                    <?php include get_template_directory() . '/assets/arrangement.php'; ?>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_query(); ?>

        </div>
    </div>
</section>


<!-- Button section -->
<section class="bg-black">
    <div class="container flex justify-center flex-wrap gap-6 lg:gap-10">
        <a href="tel:0638383838" class="btn accent-color uppercase w-full md:w-fit">Bel 06-38383838</a>
        <a href="<?php echo home_url('/arrangementen'); ?>" class="btn accent-color  uppercase w-full md:w-fit">Reserveren</a>  
    </div>
</section>

<!-- USP (Unique selling points) section -->
<?php include get_template_directory() . '/assets/usp.php'; ?>

<!-- CTA section -->
<?php include get_template_directory() . '/assets/cta.php'; ?>

<?php get_footer(); ?>