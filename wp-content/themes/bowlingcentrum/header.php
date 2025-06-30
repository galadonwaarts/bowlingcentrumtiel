<!doctype html>
<html <?php language_attributes(); ?> class="no-js scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_site_icon_url(); ?>" rel="shortcut icon">
    <link href="<?php echo get_site_icon_url(); ?>" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>


</head>

<body <?php body_class('bodyclass text-neutral selection:bg-primary selection:text-bg-dark bg-white'); ?>>


    <header class="group bg-transparent fixed w-full top-0 z-50 shadow-md [&.scrolled]:drop-shadow-md [&.scrolled]:bg-bg-dark transition-all ease-in-out transform">
        <div class="container">
            <nav class="mx-auto flex items-center justify-between gap-x-6  transition-all ease-in-out group-[.scrolled]:py-2" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="<?php echo get_home_url(); ?>" class="-m-1.5 p-1.5">
                        <img src="<?php the_field('g_logo', 'option'); ?>" alt="logo" class="inline-block h-full transition-all ease-in-out w-[95px] sm:w-[177] group-[.scrolled]:max-w-[138px]">
                    </a>
                </div>
                <div class="space-y-4">
                    <div class="hidden lg:flex gap-x-4 justify-end">
                        <?php if (get_field('g_phone', 'option')) : ?>
                            <a href="tel:<?php the_field('g_phone', 'option'); ?>" class="btn">Bel <?php the_field('g_phone', 'option'); ?></a>
                        <?php endif; ?>
                        <?php
                        $link = get_field('header_booking_link', 'option');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>

                    </div>
                    <ul class="menu-wrap hidden lg:flex lg:gap-x-12 justify-end">
                        <?php onwaarts_nav(); ?>
                    </ul>
                </div>
                <div class="flex lg:hidden">
                <a class="menu-toggle open text-white cursor-pointer">
                    <i class="fa-regular fa-bars ml-4 text-2xl sm:text-4xl"></i>
                </a>
                <a class="menu-toggle close hidden text-white cursor-pointer">
                    <i class="fa-regular fa-xmark ml-4 text-2xl sm:text-4xl"></i>
                </a>
            </div>
            </nav>
        </div>
        <!-- Mobile menu, show/hide based on menu open state. -->
    </header>

   <!-- Background backdrop, show/hide based on slide-over state. -->
   <div class="fixed lg:hidden mobile-menu h-screen inset-y-0 right-[-100%] [&.active]:right-0 z-40 w-full overflow-y-auto bg-bg-dark px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">

<div class="mt-6 flow-root">
    <div class="">
        <ul class="menu-wrap space-y-2  font-sans">
            <?php onwaarts_nav(); ?>
            <?php
        $link = get_field('header_booking_link', 'option');
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
            class="w-fit btn accent-color uppercase flex items-center gap-2">
                <i class="fa-solid fa-bowling-ball"></i>
                <span class="text-sm font-bold text-white tracking-wide"><?php echo esc_html($link_title); ?></span>
            </a>
        <?php endif; ?>
        
        <div class="h-px !my-6 bg-white/80"></div>
    

        
        
        <li class="flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                <a href="tel:<?php the_field('g_phone', 'option'); ?>" class="text-white  hover:text-primary"><?php the_field('g_phone', 'option'); ?></a>
        </li>
            <li class="flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                </svg>
                <a href="mailto:<?php the_field('g_mail', 'option'); ?>" class="text-white  hover:text-primary"><?php the_field('g_mail', 'option'); ?></a>
        </li>
            
            </ul>
    </div>
</div>
</div>