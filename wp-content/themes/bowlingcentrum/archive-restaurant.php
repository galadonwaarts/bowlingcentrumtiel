<?php get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<section class="bg-black">
    <div class="container py-16 sm:py-24">
        <h2 class="text-center">Restaurant</h2>
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

<section class="bg-black">
    <div class="container py-16 sm:py-24 grid grid-cols-1 md:grid-cols-12">
        <div class="col-span-full max-md:mb-8 md:col-span-7 md:border-l-8 md:border-b-8 md:p-[30px] border-accent">
            <h2>Restaurant</h2>
            <p class="text-white">
                Lorem ipsum dolor sit amet,consectetur adipisicing elit. Consectetur officia, quo quasi cupiditate quas sed officiis earum libero omnis nemo, pariatur, doloribus eveniet debitis nostrum commodi consequuntur. Maiores neque facilis cum itaque, voluptatibus magnam minima optio illum, assumenda rerum ducimus possimus recusandae pariatur velit consequatur perferendis tempore suscipit doloremque magni fugiat quibusdam fuga. Accusamus recusandae neque, obcaecati quasi culpa aperiam.
            </p>
        </div>
        <div class="hidden md:block col-span-1"></div>

        <div class="col-span-6 md:col-span-4">
            <h2>Openingstijden</h2>
            <ul class="grid grid-cols-2  gap-x-2 text-white">
                <?php while (have_rows('opening_times_repeater', 'option')) : the_row();
                                $day = get_sub_field('day', 'option');
                                $opening_times = get_sub_field('opening_times', 'option');
                            ?>
    
                                <li><span><?php echo esc_html($day); ?></span></li>
                                <li><span><?php echo esc_html($opening_times); ?></span></li>
    
                            <?php endwhile; ?>
            </ul>
        </div>
    </div>
   
</section>

<?php include get_template_directory() . '/assets/usp.php'; ?>


<?php get_footer(); ?>