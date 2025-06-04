<?php get_header(); ?>


<main role="main" id="page" class="gutenberg">

    <!--   PAGE HEAD  -->
    <?php include get_template_directory() . '/assets/page-head.php'; ?>


    <div class="container mx-auto py-10 xl:py-16 mx-auto max-w-5xl">

        <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

            <!-- article -->
            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-primary mb-5">
                <time datetime="2020-03-16" class="mr-8"><?php the_time('F j, Y'); ?></time>
                <div class="-ml-4 flex items-center gap-x-4">
                    <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-black/50">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="flex gap-x-2.5">
                        <?php the_author(); ?>
                    </div>
                </div>
            </div>
            <article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>

                <?php the_content(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h2><?php _e( 'Sorry, nothing to display.', 'onwaarts' ); ?></h2>

            </article>
            <!-- /article -->

        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>
