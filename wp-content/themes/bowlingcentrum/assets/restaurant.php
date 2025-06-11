<?php
if (get_post_type() === 'restaurant') {
?>
<a href="<?php the_permalink(); ?>" class="block rounded-2xl overflow-hidden hover:shadow-accent hover:shadow-full-light hover:opacity-90 transition-opacity">
    <div>
        <div class="relative  p-4 flex flex-col justify-end min-h-[200px] h-full" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-t-2xl"></div>
            <span class="mb-2 text-white text-2xl font-bold relative z-10"><?php the_title(); ?></span>
            <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
        </div>
        <div class="bg-white px-6 py-2.5 ">
            <span class="btn w-full uppercase block text-center">Meer info</span>
        </div>
    </div>
</a>
<?php } else {
    echo '<!-- This template should only be used within a restaurant post type -->';
} ?>