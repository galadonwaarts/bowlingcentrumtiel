<?php get_header(); ?>


<main role="main" id="page" class="gutenberg">

    <!-- PAGE HEAD -->
    <?php include get_template_directory() . '/assets/page-head.php'; ?>


    <div class="container py-10 xl:py-16 px-6 lg:px-8">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>


                <?php the_content(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; endif; ?>


    </div>

</main>



<?php get_footer(); ?>
