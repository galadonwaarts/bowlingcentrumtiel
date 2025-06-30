<?php

/**
 * Block Name: Reserveer sidebar
 *
 */

if (is_admin()) {
    echo '<div style="padding: 10px; background: #f1f1f1; width: 100%; text-align: center; font-weight: bold">Reserveer blok</div>';
    return '';
}
?>

</div>

<div class="sidebar-container">
    <?php
    $text_on_image = get_field('sidebar_title');

    $image    = get_field('sidebar_img');
    $size     = 'large'; // (thumbnail, medium, large, full of custom size)
    $alt_text = get_post_meta($image, '_wp_attachment_image_alt', true);

    $link = get_field('sidebar_booking_link');
    if ($link):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif;
    ?>
    <div class="flex flex-col gap-y-8 h-full">
        <!-- Image -->
        <div class="hidden md:block rounded-2xl overflow-hidden">
            <div class="relative  p-4 flex flex-col justify-end min-h-[200px] h-full bg-cover bg-center" style="background-image: url('<?php echo wp_get_attachment_image_url($image, $size); ?>');">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
                <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php echo $text_on_image; ?></span>
                <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="space-y-4">
            <?php if (get_field('g_phone', 'option')) : ?>
                <a href="tel:<?php the_field('g_phone', 'option'); ?>" class="btn uppercase w-full">Bel <?php the_field('g_phone', 'option'); ?></a>
            <?php endif; ?>
            <?php if (!is_page('reserveren')) : ?>
                <a href="/reserveren?title=<?php echo basename(get_permalink()); ?>" 
                class="btn accent-color uppercase w-full"><?php _e('Online reserveren', 'bowlingcentrum'); ?></a>
            <?php endif; ?>
        </div>

        <!-- Opening times-->
        <div>
            <h2><?php _e('Openingstijden', 'bowlingcentrum'); ?></h2>
            <ul class="grid grid-cols-2  gap-x-2 text-white">
                <?php while (have_rows('opening_times_repeater', 'option')) : the_row();
                    $day = get_sub_field('day', 'option');
                    $opening_times = get_sub_field('opening_times', 'option');
                ?>

                    <li><span><?php echo esc_html($day); ?></span></li>
                    <li><span><?php echo esc_html($opening_times); ?></span></li>

                <?php endwhile; ?>
            </ul>
        </div>

    </div>
</div>