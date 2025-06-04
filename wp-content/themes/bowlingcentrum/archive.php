<?php get_header(); ?>


    <main role="main" id="page" class="gutenberg">

        <!--   PAGE HEAD  -->
        <?php include get_template_directory() . '/assets/page-head.php'; ?>


        <div class="bg-white py-6">
            <div class="container">
                <div class="mx-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <?php include get_template_directory() . '/assets/article.php'; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>


                <div class="text-center">
                    <?php get_template_part('pagination'); ?>
                </div>
            </div>
        </div>

    </main>


<?php get_footer(); ?>