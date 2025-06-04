<?php
/**
 * Block Name: VIDEO block
 *
 */

if (is_admin()) {
    echo '<div style="padding: 10px; background: #f1f1f1; width: 100%; text-align: center; font-weight: bold">Video blok</div>';
    return '';
}
?>

</div>
<section class="py-32 md:pt-80 md:pb-28 px-6 relative overflow-hidden bg-black">
    <div class="absolute inset-x-0 -top-20 -bottom-8 z-10 bg-[#08124f] opacity-70 rellax" data-rellax-speed="-3" data-rellax-percentage="0.5" style="transform: translate3d(0px, 0px, 0px);">
        <video src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-blue.mp4" class="w-full h-full object-cover" muted="" autoplay="" loop="" playsinline="">
        </video></div>
    <div class="max-w-screen-xl mx-auto relative z-20">
        <img src="<?php the_field('g_logo_alt', 'option'); ?>" alt="" class="mx-auto md:mx-0 w-[300px] mb-8">
        <div class="text-18 md:text-40 text-white text-center md:text-left leading-tight max-w-[850px]">
            <?php the_field('cta_video_text', 'option'); ?>
        </div>
    </div>
</section>

<div class="container max-w-screen-xl mx-auto">
