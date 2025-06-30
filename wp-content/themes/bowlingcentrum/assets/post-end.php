<?php
$description = '';
if (get_post_type() === 'arrangement') {
    $description = get_field('long_description');
} elseif (is_post_type_archive('restaurant')) {
    $description = get_field('restaurant_page_end_description', 'option');
}
?>


<section class="bg-bg-dark">
    <div class="container py-16 sm:py-24 grid grid-cols-1 md:grid-cols-12">
        <div class="col-span-full max-md:mb-8 md:col-span-7 md:border-l-8 md:border-b-8 md:p-[30px] border-accent style-paragraph">
            <h2 class="uppercase"><?php the_title(); ?></h2>
            <?php echo $description; ?>
        </div>
        

        <div class="col-span-full md:col-start-10">
            <h2 class="uppercase break-words"><?php _e('Openingstijden', 'bowlingcentrum'); ?></h2>
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
   
</section>