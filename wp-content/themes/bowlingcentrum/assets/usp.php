<section class="bg-bg-dark">
    <div class="container py-8">
        <div class="grid grid-cols-2 md:grid-cols-4">
            <?php if( have_rows('usp', 'option') ): while( have_rows('usp', 'option') ) : the_row(); ?>
                <div class="p-8 text-center flex flex-col items-center justify-center gap-8">
                    <?php
                    $image    = get_sub_field( 'img' );
                    $size     = 'custom-size'; // (thumbnail, medium, large, full of custom size)
                    $alt_text = get_post_meta( $image, '_wp_attachment_image_alt', true );
                    ?>
                    <img loading="lazy" class="size-16" alt="<?php echo $alt_text ?>" src="<?php echo wp_get_attachment_image_url( $image, $size ); ?>">
                    <h3 class="text-base sm:text-lg text-white uppercase"><?php the_sub_field('name'); ?></h3>


                </div>
            <?php endwhile; endif; ?>
        </div>
</section>