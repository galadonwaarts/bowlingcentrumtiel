<?php get_header(); ?>


<main role="main" id="page" class="gutenberg">

    <!--   PAGE HEAD  -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 bg-black">

        <?php
        $image = get_field('blog_head', 'option');
        $size = 'head-size'; // (thumbnail, medium, large, full or custom size)
        $alt_text = get_post_meta($image, '_wp_attachment_image_alt', true);
        ?>


        <img alt="<?php echo $alt_text ?>" src="<?php echo wp_get_attachment_image_url($image, $size); ?>"
             class="absolute inset-0 -z-10 h-full w-full object-cover opacity-60">


        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-serif font-bold tracking-tight text-white sm:text-6xl"><?php the_field('blog_title', 'option'); ?></h2>
            </div>
        </div>
    </div>


    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?php the_field('blog_intro_title', 'option'); ?></h2>
                <p class="mt-2 text-lg leading-8 text-gray-600"><?php the_field('blog_intro', 'option'); ?></p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <?php include get_template_directory() . '/assets/article.php'; ?>


                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>
                        <h2><?php _e('Sorry, nothing to display.', 'onwaarts'); ?></h2>
                    </article>
                    <!-- /article -->

                <?php endif; ?>

                <div class="text-center">
                    <?php get_template_part('pagination'); ?>
                </div>

            </div>
        </div>
    </div>




</main>


<?php get_footer(); ?>
