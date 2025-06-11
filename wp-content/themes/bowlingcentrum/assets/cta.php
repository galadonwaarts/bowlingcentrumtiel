<!-- CTA section -->
<section class="bg-black">
    <?php 
    $title = get_field('cta_title', 'option');
    $description = get_field('cta_description', 'option');
    $image    = get_field( 'cta_img', 'option' );
    $size     = 'custom-size'; // (thumbnail, medium, large, full of custom size)
    $alt_text = get_post_meta( $image, '_wp_attachment_image_alt', true );

    $link = get_field('cta_link', 'option');
    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif;
    ?>

    <div class="max-w-screen-lg mx-auto px-5 py-16 sm:py-24">
        <div class="relative grid grid-cols-1 md:grid-cols-12">
            <h2 class="md:hidden"><?php echo $title; ?></h2>
            <img class="md:col-span-7 w-full"loading="lazy" alt="<?php echo $alt_text ?>" src="<?php echo wp_get_attachment_image_url( $image, $size ); ?>">
            <p class="md:hidden text-white my-8"><?php echo $description; ?></p>
            <a class="btn w-full md:hidden" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

            <div class="hidden md:block md:col-span-5 relative">
                <div class="absolute left-[-20%] top-[30px] bg-black border-l-8 border-b-8 border-accent py-[30px] px-[15px]">
                    <h2 class="hidden md:block"><?php echo $title; ?></h2>
                    <p class="hidden md:block text-white"><?php echo $description; ?></p>
                    <a class="btn w-full" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </div>
            </div>
        </div>

    </div>
</section>
