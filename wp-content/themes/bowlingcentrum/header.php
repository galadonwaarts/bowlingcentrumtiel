<!doctype html>
<html <?php language_attributes(); ?> class="no-js scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_site_icon_url(); ?>" rel="shortcut icon">
    <link href="<?php echo get_site_icon_url(); ?>" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>


</head>
<body <?php body_class('bodyclass text-neutral selection:bg-primary selection:text-black bg-white'); ?>>


<header class="group bg-transparent fixed w-full top-0 z-50 shadow-md [&.scrolled]:drop-shadow-md [&.scrolled]:bg-black transition-all ease-in-out transform">
    <div class="container">
        <nav class="mx-auto flex items-center justify-between gap-x-6  transition-all ease-in-out group-[.scrolled]:py-2" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="<?php echo get_home_url(); ?>" class="-m-1.5 p-1.5">
                    <img src="<?php the_field('g_logo', 'option'); ?>" alt="logo" class="inline-block h-full transition-all ease-in-out w-[120px] sm:w-[177] group-[.scrolled]:max-w-[168px]">
                </a>
            </div>
            <div class="space-y-4">
                <div class="hidden lg:flex gap-x-4 justify-end">
                    <a href="/bestellen" class="btn">Bestellen</a>
                    <a href="/contact" class="btn">Contact</a>
                </div>
                <ul class="menu-wrap hidden lg:flex lg:gap-x-12 justify-end">
                    <?php onwaarts_nav(); ?>
                </ul>
            </div>
            <div class="flex lg:hidden ">
                <a class="menu-toggle text-xl text-gray-900 hover:text-primary cursor-pointer">
                    <i class="fa-solid fa-bars ml-4"></i>
                </a>
            </div>
        </nav>
    </div>
    <!-- Mobile menu, show/hide based on menu open state. -->
</header>

    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed lg:hidden mobile-menu h-screen inset-y-0 right-[-100%] [&.active]:right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center gap-x-6">


            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 menu-toggle">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <ul class="menu-wrap space-y-2 py-6">
                    <?php onwaarts_nav(); ?>
                </ul>
            </div>
        </div>
    </div>
