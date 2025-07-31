<footer>
    <div class="bg-bg-dark  shadow-xl">
        <div class="container pt-16 pb-12">
            <div class="flex flex-col lg:flex-row justify-between ">
                <!-- Logo -->
                <div class="">
                    <a href="<?php echo get_home_url(); ?>" class="inline-block">
                        <img src="<?php the_field('g_logo', 'option'); ?>" alt="logo">
                    </a>
                </div>

                <!-- Footer blokken -->
                <div class="grid grid-cols-1 max-lg:mt-12 xs:grid-cols-2 md:grid-cols-3  md:gap-x-10">

                    <?php if (get_field('footer_blok_content_1', 'option')) : ?>
                        <div class="mb-4">
                            <span class="block-title">
                                <?php the_field('footer_blok_titel_1', 'option'); ?>
                            </span>
                            <div class="block-content">
                                <?php the_field('footer_blok_content_1', 'option'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('footer_blok_content_2', 'option')) : ?>
                        <div class="mb-4">
                            <span class="block-title">
                                <?php the_field('footer_blok_titel_2', 'option'); ?>
                            </span>
                            <div class="block-content">
                                <?php the_field('footer_blok_content_2', 'option'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('footer_blok_content_3', 'option')) : ?>
                        <div class="mb-4">
                            <span class="block-title">
                                <?php the_field('footer_blok_titel_3', 'option'); ?>
                            </span>
                            <div class="block-content">

                                <?php the_field('footer_blok_content_3', 'option'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Socials -->
            <div class="flex gap-x-3 leading-none">
                <?php if (get_field('g_facebook', 'option')): ?>
                    <a href="<?php the_field('g_facebook', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-[36px] h-[36px] bg-neutral hover:bg-primary rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-facebook-f  text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if (get_field('g_linkedin', 'option')): ?>
                    <a href="<?php the_field('g_linkedin', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-[36px] h-[36px] bg-neutral hover:bg-primary rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-linkedin-in  text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if (get_field('g_insta', 'option')): ?>
                    <a href="<?php the_field('g_insta', 'option'); ?>">
                        <div class="w-auto">
                            <div class="relative mx-auto w-[36px] h-[36px] bg-neutral hover:bg-primary rounded-full">
                                <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <i class="fa-brands fa-instagram  text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

        </div>
        <!-- Copyright -->
        <div class="bg-primary">
            <div class="container flex items-center max-lg:flex-col gap-y-4 gap-x-8 lg:justify-end py-4">
                <div class="copyright text-center leading-normal text-sm">
                    <?php the_field('copyright_footer', 'option'); ?>
                </div>
                <a href="https://www.onwaarts.nl" class="inline-block" target="_blank">
                    <img style="max-width: 100px; vertical-align: middle;" src="https://onwaarts.nl/logincss/onwaarts.svg" alt="onwaarts">
                </a>
            </div>
        </div>
    </div>
    


</footer>
<?php wp_footer(); ?>

</body>

</html>