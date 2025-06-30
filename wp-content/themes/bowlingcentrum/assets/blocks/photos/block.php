<?php

/**
 * Block Name: VIDEO block
 *
 */

if (is_admin()) {
    echo '<div style="padding: 10px; background: #f1f1f1; width: 100%; text-align: center; font-weight: bold">Dit is het foto albums blok</div>';
    return '';
}
?>

</div>
<section class="bg-[#181818]">
    <div class="container">
        <h2 class="text-center"><?php the_field('photo_album_title'); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php if (have_rows('photo_album_repeater')): while (have_rows('photo_album_repeater')) : the_row();
                    $image    = get_sub_field('img');
                    $size     = 'large'; // (thumbnail, medium, large, full of custom size)
                    $alt_text = get_post_meta($image, '_wp_attachment_image_alt', true);

                    $link = get_sub_field('btn_link');
                    if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    endif;
            ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="block rounded-2xl overflow-hidden hover:shadow-accent hover:shadow-full-light hover:opacity-90 transition-all duration-300">

                        <div class="relative  p-4 flex flex-col justify-end min-h-[200px] h-full bg-cover bg-center" style="background-image: url('<?php echo wp_get_attachment_image_url($image, $size); ?>');">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
                            <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php echo $link_title; ?></span>
                            <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
                        </div>

                    </a>

            <?php endwhile;
            endif; ?>

        </div>
    </div>
</section>