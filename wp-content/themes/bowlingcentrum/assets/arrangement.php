<?php
if (get_post_type() === 'arrangement') {
    $image    = get_field('arrangement_img');
    $size     = 'medium'; // (thumbnail, medium, large, full of custom size)
    $alt_text = get_post_meta($image, '_wp_attachment_image_alt', true);
?>
<a href="<?php the_permalink(); ?>" class="block rounded-2xl overflow-hidden hover:shadow-accent hover:shadow-full-light hover:opacity-90 transition-opacity">
    <div class="flex flex-col lg:flex-row h-full">
        <div class="relative  p-4 flex flex-col justify-end min-h-[200px] h-full lg:w-[45%]" style="background-image: url('<?php echo wp_get_attachment_image_url($image, 'full'); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
            <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php the_title(); ?></span>
            <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
        </div>
        <div class="bg-white px-4 py-2.5 flex flex-col justify-between lg:w-[55%]">
            <div class="mb-2">
                <span class="text-base text-accent mb-4">Vanaf</span>
                <div class="flex items-center">
                    <span class="text-[30px] font-bold text-accent">€8.50</span>
                    <span class="text-sm text-accent ml-6">per persoon</span>
                </div>
            </div>
            <p class="text-fontcolor"><?php the_field('arrangement_description'); ?></p>
            <span class="btn w-full uppercase block text-center">Meer info</span>
        </div>
    </div>
</a>
<?php } else {
    echo '<!-- This template should only be used within an arrangement post type -->';
} ?>