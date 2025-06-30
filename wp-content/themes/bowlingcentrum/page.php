<?php get_header(); ?>


<main role="main" id="page" class="gutenberg">

    <!-- PAGE HEAD -->
    <?php include get_template_directory() . '/assets/page-head.php'; ?>

<div class="bg-bg-dark">
    <div class="container py-16 sm:py-24">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>


                <?php the_content(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; endif; ?>
    </div>
</div>

    <!-- USP -->
    <?php include get_template_directory() . '/assets/usp.php'; ?>

    <!-- CTA -->
    <?php include get_template_directory() . '/assets/cta.php'; ?>
</main>



<?php get_footer(); ?>
