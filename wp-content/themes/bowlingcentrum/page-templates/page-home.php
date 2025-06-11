<?php
// template name: Home
get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<!-- Arrangementen -->
<section class="bg-black">
    <div class="container grid py-16 sm:py-24">
        <div class="">
            <h2 class="text-center">Arrangementen</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php $new_loop = new WP_Query(array(
                'post_type' => 'arrangement',
                'posts_per_page' => 4 // aantal posts dat je wilt tonen
            ));
            ?>
            <?php if ($new_loop->have_posts()) : ?>
                <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>
                    <?php include get_template_directory() . '/assets/arrangement.php'; ?>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_query(); ?>

        </div>
        <a href="<?php echo home_url('/arrangementen'); ?>" class="btn mt-10 mx-auto  uppercase w-full md:w-fit">Zie meer arrangementen</a>
    </div>
</section>

<!-- Button section -->
<section class="bg-black">
    <div class="container flex justify-center flex-wrap gap-6 lg:gap-10">
        <a href="tel:0638383838" class="btn accent-color uppercase w-full md:w-fit">Bel 06-38383838</a>
        <a href="<?php echo home_url('/arrangementen'); ?>" class="btn accent-color  uppercase w-full md:w-fit">Reserveren</a>  
    </div>
</section>

<!-- Restaurant -->
<section class="bg-black">
    <div class="container py-16 sm:py-24 grid">
        <div class="">
            <h2 class="text-center">Restaurant</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $new_loop = new WP_Query(array(
                'post_type' => 'restaurant',
                'posts_per_page' => 4 // aantal posts dat je wilt tonen
            ));
            ?>
            <?php if ($new_loop->have_posts()) : ?>
                <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>
                    <?php include get_template_directory() . '/assets/restaurant.php'; ?>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_query(); ?>
        </div>

        <a href="<?php echo home_url('/restaurant'); ?>" class="mx-auto mt-10 btn w-fit uppercase">Zie meer restaurnat opties</a>

    </div>

</section>



<!-- USP (Unique selling points) section -->
<?php include get_template_directory() . '/assets/usp.php'; ?>

<!-- CTA section -->
<?php include get_template_directory() . '/assets/cta.php'; ?>


<?php get_footer(); ?>