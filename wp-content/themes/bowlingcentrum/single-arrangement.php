<?php get_header(); ?>

<?php include get_template_directory() . '/assets/page-head.php'; ?>

<main role="main" id="page" class="gutenberg single-restaurant">

    <?php if (!wp_get_post_parent_id(get_the_ID())) : ?>
        <!-- This is the parent/main page -->
        <section class="bg-bg-dark">
            <div class="container py-16 sm:py-24">
                <h2 class="text-center"><?php the_title(); ?></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    $args = array(
                        'post_type' => 'arrangement',
                        'post_parent' => get_the_ID(),
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    );

                    $child_query = new WP_Query($args);

                    if ($child_query->have_posts()) :
                        while ($child_query->have_posts()) : $child_query->the_post();

                        $arrangement_img    = get_field( 'arrangement_img' );
                        $size     = 'large'; // (thumbnail, medium, large, full or custom size)
                        $alt_text = get_post_meta( $arrangement_img, '_wp_attachment_image_alt', true );
                    ?>
                            <a href="<?php the_permalink(); ?>" class="block rounded-2xl overflow-hidden hover:shadow-accent hover:shadow-full-light hover:opacity-90 transition-opacity">
                                <div>
                                    <div class="relative  p-4 flex flex-col justify-end min-h-[200px] h-full" style="background-image: url('<?php echo wp_get_attachment_image_url($arrangement_img, $size); ?>'); background-size: cover; background-position: center;">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
                                        <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php the_title(); ?></span>
                                        <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
                                    </div>
                                    <div class="bg-white px-6 py-2.5 ">
                                        <span class="btn w-full uppercase block text-center"><?php _e('Meer info', 'bowlingcentrum'); ?></span>
                                    </div>
                                </div>
                            </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Post end -->
        <?php include get_template_directory() . '/assets/post-end.php'; ?>

    <?php else : ?>
        <!-- This is a child page -->
        <section class="bg-bg-dark">
            <div class="max-w-[1140px] px-5 mx-auto py-16 sm:py-24">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
                            <?php the_content(); ?>
                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <article>
                        <h2><?php _e('Sorry, nothing to display.', 'onwaarts'); ?></h2>
                    </article>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- USP -->
    <?php include get_template_directory() . '/assets/usp.php'; ?>

</main>

<?php get_footer(); ?>