<?php get_header(); ?>


<main role="main" id="page" class="gutenberg">

    <!--   PAGE HEAD  -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 bg-black">

<!--        <img src="--><?php //the_post_thumbnail_url('head-size'); ?><!--" class="absolute inset-0 -z-10 h-full w-full object-cover opacity-60">-->


        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-serif font-bold tracking-tight text-white sm:text-6xl">404 - <?php _e( 'Pagina niet gevonden', 'onwaarts' ); ?></h2>
                 </div>
        </div>
    </div>


    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    <?php _e( 'Helaas!', 'onwaarts' ); ?>
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    <?php _e( 'Pagina niet gevonden', 'onwaarts' ); ?> <br>

                    <a href="<?php echo home_url(); ?>"><?php _e( 'Ga terug naar Home', 'onwaarts' ); ?></a>
                </p>
            </div>

        </div>
    </div>

</main>



<?php get_footer(); ?>
