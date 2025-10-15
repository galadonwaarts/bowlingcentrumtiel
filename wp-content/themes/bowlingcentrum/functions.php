<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 450, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('custom-square', 600, 600, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('head-size', 2000, '', true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('onwaarts', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// onwaarts Blank navigation
function onwaarts_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'menu' => '',
            'container' => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'menu',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '%3$s',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Load onwaarts Blank scripts (header.php)
function onwaarts_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_enqueue_script('customscript', get_template_directory_uri() . '/app/app.js', array('jquery'), null);
    }
}

// Load onwaarts Blank styles
function onwaarts_styles()
{
    wp_enqueue_style('onwaarts', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('customcss', get_template_directory_uri() . '/app/app.css', array(), '1.0', 'all');
}

// Register onwaarts Blank Navigation
function register_onwaarts_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'onwaarts'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'onwaarts'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'onwaarts') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'onwaarts'),
        'description' => __('Description for this widget-area...', 'onwaarts'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'onwaarts'),
        'description' => __('Description for this widget-area...', 'onwaarts'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}


// Custom Excerpts
function onwaartswp_index($length) // Create 20 Word Callback for Index page Excerpts, call using onwaartswp_excerpt('onwaartswp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using onwaartswp_excerpt('onwaartswp_custom_post');
function onwaartswp_custom_post($length)
{
    return 40;
}

// Alleen parent items (post_parent = 0) tonen in het ACF Relationship veld 'arrangementen_selection'
// en op beheer-volgorde (menu_order ASC) sorteren.
add_filter('acf/fields/relationship/query/key=field_68d4f92a7aa9d', function ($args, $field, $post_id) {
    
    // Beperk tot jouw CPT
    $args['post_type'] = ['arrangement'];
    // Alleen hoofditems
    $args['post_parent'] = 0;
    // Netjes sorteren op de ingestelde volgorde
    $args['orderby'] = 'menu_order';
    $args['order']   = 'ASC';
    // Kleine optimalisaties
    $args['post_status']     = 'publish';
    $args['posts_per_page']  = 200;
    $args['no_found_rows']   = true;
    return $args;
}, 10, 3);



// Verberg 'Gebruik de editor' (field name: use_editor) op child-arrangementen
add_filter('acf/prepare_field/name=use_editor', function ($field) {
    if (is_admin()) {
        // Huidig post ID bepalen (werkt bij zowel bewerken als quick save)
        $post_id = 0;
        if (!empty($_GET['post'])) {
            $post_id = (int) $_GET['post'];
        } elseif (!empty($_POST['post_ID'])) {
            $post_id = (int) $_POST['post_ID'];
        }

        // Alleen voor ons CPT
        if ($post_id && get_post_type($post_id) === 'arrangement') {
            // Heeft dit bericht een parent? Dan is het een child -> verbergen
            if (wp_get_post_parent_id($post_id)) {
                return false; // verbergt het veld in de editor
            }
        }
    }
    return $field; // tonen (op hoofd-arrangement of bij nieuw item zonder parent)
});

// Create the Custom Excerpts callback
function onwaartswp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function onwaarts_theme_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'onwaarts') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function onwaarts_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function onwaartsgravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function onwaartscomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
    <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['180']); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br/>
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a
                href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
            <?php
            printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '');
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ('div' != $args['style']) : ?>
    </div>
<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'onwaarts_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'onwaarts_styles'); // Add Theme Stylesheet
add_action('init', 'register_onwaarts_menu'); // Add onwaarts Blank Menu
//add_action('init', 'create_post_type_onwaarts'); // Add our onwaarts Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'onwaartswp_pagination'); // Add pagination to the theme


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'onwaartsgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'onwaarts_theme_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'onwaarts_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('onwaarts_shortcode_demo', 'onwaarts_shortcode_demo'); // You can place [onwaarts_shortcode_demo] in Pages, Posts now.
add_shortcode('onwaarts_shortcode_demo_2', 'onwaarts_shortcode_demo_2'); // Place [onwaarts_shortcode_demo_2] in Pages, Posts now.




// ONWAARTS PAGINATION
function onwaartswp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
    ));
}


// GRAVITY FORMS SPINNER
// =============================
/* Change Gravity Forms' Ajax Spinner into a transparent image */
add_filter('gform_ajax_spinner_url', 'spinner_url', 10, 2);
function spinner_url($image_src, $form)
{
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}



/*------------------------------------*\
    ADMIN BAR
\*------------------------------------*/
//Custom admin toolbar
function change_toolbar($wp_toolbar) {


    $wp_toolbar->add_menu(array(
        'id' => 'onwaarts_support',
        'title' => __('Help', 'ONWAARTS')
    ));

    //*add custom support items
    $wp_toolbar->add_node(array(
        'id' => 'onwaarts_support_manual',
        'title' => __('Kennisbank', 'onwaarts'),
        'href' => 'https://www.onwaarts.nl/kennisbank/',
        'meta' => array('target' => 'help'),
        'parent' => 'onwaarts_support'
    ));
    $wp_toolbar->add_node(array(
        'id' => 'onwaarts_support_contact',
        'title' => __('Ondersteuning vragen', 'onwaarts'),
        'href' => 'https://www.onwaarts.nl/contact/',
        'meta' => array('target' => 'help'),
        'parent' => 'onwaarts_support'
    ));
    //*/

}
add_action('admin_bar_menu', 'change_toolbar', 999);

function modify_footer_admin () {
    echo 'Website door <a href="https://www.onwaarts.nl" target="_blank">Onwaarts</a>';
} add_filter('admin_footer_text', 'modify_footer_admin');

/*------------------------------------*\
    LOGIN CSS
\*------------------------------------*/

function my_login_stylesheet()
{
    wp_enqueue_style('custom-login', 'https://www.onwaarts.nl/logincss/logincss.css');
}

add_action('login_enqueue_scripts', 'my_login_stylesheet');


// ACF GUTENBERG BLOCK
// ===========================

if (class_exists('ACF')) :
    function tt3child_register_acf_blocks()
    {
        register_block_type(__DIR__ . '/assets/blocks/acties');
        register_block_type(__DIR__ . '/assets/blocks/photos');
        register_block_type(__DIR__ . '/assets/blocks/booking');
    }

    // Here we call our tt3child_register_acf_block() function on init.
    add_action('init', 'tt3child_register_acf_blocks');

endif;


/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');



// Remove updated cart notification
add_filter('woocommerce_add_message', '__return_false');