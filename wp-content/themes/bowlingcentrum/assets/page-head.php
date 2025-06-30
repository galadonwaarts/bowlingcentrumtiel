<?php 
if (is_post_type_archive('restaurant')) {
    $title = get_field('restaurant_title', 'option');
    $image = get_field('restaurant_bg_img', 'option');
} elseif (is_post_type_archive('arrangement')) {
    $title = get_field('arrangement_title', 'option');
    $image = get_field('arrangement_bg_img', 'option');
} else {
    $title = get_the_title();
    $image = get_post_thumbnail_id();
}
$size = 'head-size';
?>

<div class="relative isolate overflow-hidden bg-bg-dark pt-48 pb-20 sm:pt-80 sm:pb-40">

    <img src="<?php echo wp_get_attachment_image_url($image, $size); ?>" class="absolute inset-0 -z-10 h-full w-full object-cover object-center opacity-50">

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-bg-dark via-transparent to-bg-dark"></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 h-full grid items-center">
        <div class="mx-auto lg:mx-0">
            <h2 class="max-lg:text-center text-3xl lg:text-[70px] lg:leading-[90px] uppercase text-white font-bold">
                <?php echo $title; ?>
            </h2>
        </div>
    </div>
</div>