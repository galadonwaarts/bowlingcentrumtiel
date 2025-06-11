<?php
/**
 * Block Name: VIDEO block
 *
 */

if (is_admin()) {
    echo '<div style="padding: 10px; background: #f1f1f1; width: 100%; text-align: center; font-weight: bold">Dit is het acties blok</div>';
    return '';
}
?>

</div>
<section class="bg-black">
    <div class="container py-16 sm:py-24">
        <h2 class="text-center">Bekijk de arrangementen</h2>
        <div class="grid gap-14">
        <?php if( have_rows('promiotions_repeater') ): while( have_rows('promiotions_repeater') ) : the_row(); 
            $name = get_sub_field('name');
            $amount_persons = get_sub_field('people');
            $time = get_sub_field('time');
            $description = get_sub_field('description');
            $price = get_sub_field('price');
            $price_addition = get_sub_field('price_addition');

            $image    = get_sub_field( 'img' );
            $size     = 'large'; // (thumbnail, medium, large, full of custom size)
            $alt_text = get_post_meta( $image, '_wp_attachment_image_alt', true );
        ?>
            <div class="grid grid-cols-1 md:grid-cols-12 max-md:max-w-md mx-auto">
                <div class="col-span-full md:col-span-4 ">
                    <img class="w-full object-cover" loading="lazy" alt="<?php echo $alt_text ?>" src="<?php echo wp_get_attachment_image_url( $image, $size ); ?>">
                </div>
                <div class="bg-white col-span-full md:col-span-8 px-[15px] py-5">
                    <div class="flex flex-col gap-4">
                        <div>
                            <h3 class="text-accent text-[28px] font-bold"><?php echo $name; ?></h3>
                            <div class="bg-accent h-1.5 w-1/2 relative z-10"></div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-person size-5 text-primary"></i>
                                <span class="text-sm text-fontcolor"><?php echo $amount_persons; ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar-days size-5 text-primary"></i>
                                <span class="text-sm text-fontcolor"><?php echo $time; ?></span>
                            </div>
                        </div>
                        <div class="description">
                            <p><?php echo $description; ?></p>
                        </div>

                        <div class="flex flex-col md:flex-row md:justify-between">
                            <div class="mb-2">
                                <span class="text-base text-accent mb-4">Vanaf</span>
                                <div class="flex items-center">
                                    <span class="text-[30px] font-bold text-accent">€<?php echo $price; ?></span>
                                    <span class="text-sm text-accent ml-6"><?php echo $price_addition; ?></span>
                                </div>
                            </div>
                            <div class="md:justify-end">
                                <a href="tel:<?php the_field('g_phone', 'option') ?>" class="btn">Bel: <?php the_field('g_phone', 'option') ?></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        <?php endwhile; endif; ?>

            

            

        </div>
    </div>
</section>
