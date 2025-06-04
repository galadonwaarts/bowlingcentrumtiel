<footer>
    <div class="bg-primary">
        <div class="container grid max-lg:text-center lg:grid-cols-4 xl:grid-cols-5 justify-items-center items-center gap-10 pt-16 pb-24">

            <!-- Logo -->
            <div>
                <a href="<?php echo get_home_url(); ?>" class="inline-block">
                    <img src="<?php the_field('g_logo', 'option'); ?>" alt="logo">
                </a>
            </div>

            <!-- Footer blokken -->
            <?php if ( get_field('footer_blok_content_1', 'option') ) : ?>
                <div>
                    <?php the_field('footer_blok_content_1', 'option'); ?>
                </div>
            <?php endif; ?>

            <?php if ( get_field('footer_blok_content_2', 'option') ) : ?>
                <div>
                    <?php the_field('footer_blok_content_2', 'option'); ?>
                </div>
            <?php endif; ?>

            <?php if ( get_field('footer_blok_content_3', 'option') ) : ?>
                <div>
                    <?php the_field('footer_blok_content_3', 'option'); ?>
                </div>
            <?php endif; ?>

            <!-- Socials -->
            <div class="flex gap-x-3 leading-none">
                <?php if (get_field('g_facebook', 'option')): ?>
                    <a href="<?php the_field('g_facebook', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-12 h-12 bg-neutral rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-facebook-f text-[26px] text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if (get_field('g_linkedin', 'option')): ?>
                    <a href="<?php the_field('g_linkedin', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-12 h-12 bg-neutral rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-linkedin text-[26px] text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if (get_field('g_insta', 'option')): ?>
                    <a href="<?php the_field('g_insta', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-12 h-12 bg-neutral rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-instagram text-[26px] text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="bg-neutral">
        <div class="container flex max-lg:items-center max-lg:flex-col gap-y-4 justify-between py-6">
            <div class="copyright !mb-0 text-center text-white leading-normal text-sm">
                <?php the_field('copyright_footer', 'option'); ?>
            </div>
            <a href="https://www.onwaarts.nl" class="inline-block" target="_blank">
                <img style="max-width: 100px; vertical-align: middle;" src="https://onwaarts.nl/logincss/onwaarts-white.svg" alt="onwaarts">
            </a>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>

</body>
</html>