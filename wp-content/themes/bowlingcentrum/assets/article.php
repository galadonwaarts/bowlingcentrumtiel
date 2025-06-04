<article class="relative overflow-hidden rounded-2xl bg-secondary p-4 hover:drop-shadow-2xl transition-all ease-in-out"  data-aos="fade-up">

    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="hover:grayscale">
            <img class="inset-0 w-full rounded-2xl" src="<?php the_post_thumbnail_url('custom-size');?>" alt="">
        </a>
    <?php endif; ?>

    <h3 class="mt-6 text-lg font-semibold leading-6">
        <a href="<?php the_permalink(); ?>" class="text-white hover:text-primary">
            <?php the_title(); ?>
        </a>
    </h3>

    <p class="text-neutral mb-4">
        <?php onwaartswp_excerpt('onwaartswp_custom_post'); ?>
    </p>


    <div class="relative mt-6 flex items-center gap-x-4">
        <img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>" alt="" class="h-10 w-10 rounded-full bg-gray-100">
        <div class="text-sm leading-6">
            <div class="font-semibold text-white">

                <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?>
            </div>
            <div class="text-primary"><?php echo get_the_author_meta('description'); ?></div>
        </div>
    </div>

</article>