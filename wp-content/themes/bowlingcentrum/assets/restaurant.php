<?php
if (get_post_type() === 'restaurant') {

    $image    = get_field( 'restaurant_img' );
    $size     = 'large'; // (thumbnail, medium, large, full or custom size)
    $alt_text = get_post_meta( $image, '_wp_attachment_image_alt', true ); 
?>
<a href="<?php the_permalink(); ?>" class="block rounded-2xl overflow-hidden hover:shadow-primary hover:shadow-full-light">
    <div>
        <div class="relative  p-4 flex flex-col justify-end min-h-[200px] bg-cover bg-center h-full" style="background-image: url('<?php echo wp_get_attachment_image_url($image, $size); ?>');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
            <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php the_title(); ?></span>
            <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
        </div>
        <div class="bg-white px-6 py-2.5 ">
            <span class="btn w-full uppercase block text-center"><?php _e('Meer info', 'bowlingcentrum'); ?></span>
        </div>
    </div>
</a>
<?php } else {
    echo '<!-- This template should only be used within a restaurant post type -->';
} ?>