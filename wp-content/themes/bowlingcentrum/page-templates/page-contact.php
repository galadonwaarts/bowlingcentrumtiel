<?php
// template name: Contact
get_header(); ?>

<section class="bg-bg-dark">
    <div class="container py-16 sm:py-24">
        
    </div>
</section>
<!-- CTA section -->
<section class="bg-bg-dark">
    <?php 
    $title = get_field('cta_title', 'option');
    $description = get_field('cta_description', 'option');
    $image    = get_field( 'cta_img', 'option' );
    $size     = 'custom-size'; // (thumbnail, medium, large, full of custom size)
    $alt_text = get_post_meta( $image, '_wp_attachment_image_alt', true );

    $link = get_field('header_booking_link', 'option');
    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif;
    ?>

    <div class="max-w-screen-lg mx-auto px-5 py-16 sm:py-24">
        <div class="relative grid grid-cols-1 md:grid-cols-12">
            <h2 class="md:hidden"><?php _e('Contact', 'bowlingcentrum'); ?></h2>
            
            <div class="md:col-span-7 w-full aspect-video">
            <iframe 
                src="<?php the_field('g_map', 'option'); ?>" 
                class="!w-full !h-full border-0"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            </div>

            <div class="mt-8 md:mt-0 md:col-span-5 relative">
                <div class="md:absolute md:left-[-20%] md:top-[30px] md:bg-bg-dark md:border-l-8 md:border-b-8 md:border-accent w-full md:py-[30px] md:px-[15px]">
                    <h2 class="hidden md:block"><?php _e('Contact', 'bowlingcentrum'); ?></h2>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center gap-14">
                            <i class="fa-solid fa-location-dot text-primary size-6"></i>
                            <p class="text-white mb-0"><?php echo get_field('g_address', 'option'); ?></p>
                        </div>
                        <div class="flex items-center gap-14">
                            <i class="fa-solid fa-phone text-primary size-6"></i>
                            <p class="text-white mb-0"><?php echo get_field('g_phone', 'option'); ?></p>
                        </div>
                        <div class="flex items-center gap-14">
                            <i class="fa-solid fa-envelope text-primary size-6"></i>
                            <p class="text-white mb-0"><?php echo get_field('g_mail', 'option'); ?></p>
                        </div>
                    </div>
                    <a class="btn w-full" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- USP section -->
<?php include get_template_directory() . '/assets/usp.php'; ?>

<?php get_footer(); ?>