<?php get_header(); ?>


<main role="main" id="page" class="gutenberg single-restaurant">

    <!--   PAGE HEAD  -->
    <?php include get_template_directory() . '/assets/page-head.php'; ?>

<section class="bg-bg-dark">

    <div class="max-w-[1140px] px-5 mx-auto py-16 sm:py-24">

        <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

            <!-- article -->
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
</section>

<!-- USP -->
 <?php include get_template_directory() . '/assets/usp.php'; ?>

</main>

<?php get_footer(); ?>
