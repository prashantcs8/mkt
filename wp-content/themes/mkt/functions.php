<?php 
function function_wp_head() {
//incluing the css   // Enqueue scripts and styles.

//    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/lib/font-awesome-4.2.0/css/font-awesome.min.css');
        wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
        wp_enqueue_style('onepage-css', get_template_directory_uri() . '/css/onepage.css');
        wp_enqueue_style('style-css', get_template_directory_uri() . '/font/style.css');       
        wp_enqueue_style('et-line-css', get_template_directory_uri() . '/css/et-line.css');
        wp_enqueue_style('fonts-css', get_template_directory_uri() . '/css/fonts.css');       
    }
add_action('wp_enqueue_scripts', 'function_wp_head');
function register_script() {
//Vendor
//  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');    
//    wp_register_script('bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_register_script('functions-js', get_template_directory_uri() . '/js/functions.js');
    wp_register_script('jquery-gmap', get_template_directory_uri() . '/js/jquery.gmap.js');
//  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'register_script');
//
add_action('site_customjs', 'call_scripts_new');
function call_scripts_new() {
//    wp_enqueue_script('jquery');
//    wp_enqueue_script('bootstrap-min-js');    
        wp_enqueue_script('functions-js');
        wp_enqueue_script('jquery-gmap');        
}

add_action('wp_enqueue_scripts', 'initFunction');
function initFunction() {
    global $post;
    $postid = $post->ID;
    $localized_array = array('tempPath' => get_template_directory_uri(), 'ajaxUrl' => admin_url('admin-ajax.php'), 'postid' => $postid, 'like_nonce' => wp_create_nonce('creas_do_like'),
        'unlike_nonce' => wp_create_nonce('creas_do_unlike'),
        'user_id' => (is_user_logged_in()) ? get_current_user_id() : 0);
    wp_localize_script('jquery', 'siteVar', $localized_array);
}



if (!function_exists('pr')) {

    function pr($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

}

// add menus
register_nav_menu('primary', 'Primary Menu');

//include 'include_function/short.php';
include 'include_function/admin_basic.php';


function my_custom_posttypes() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name' => 'Testimonials',
        'name_admin_bar' => 'Testimonials',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'new_item' => 'New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'view_item' => 'View Testimonials',
        'all_items' => 'All Testimonials',
        'search_items' => 'Search Testimonials',
        'parent_item_colon' => 'Parent Testimonial:',
        'not_found' => 'No Testimonials found.',
        'not_found_in_trash' => 'No Testimonials found in Trash.',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-media-document',
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonial'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'revisions')
    );
    register_post_type('testimonial', $args);  
    
    $labels_team = array(
        'name' => 'Our Team',
        'singular_name' => 'Our Team',
        'menu_name' => 'Our Team',
        'name_admin_bar' => 'Our Team',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team',
        'new_item' => 'New Team',
        'edit_item' => 'Edit Team',
        'view_item' => 'View Team',
        'all_items' => 'All Team',
        'search_items' => 'Search Team',
        'parent_item_colon' => 'Parent Team:',
        'not_found' => 'No Team found.',
        'not_found_in_trash' => 'No Team found in Trash.',
    );
    $args_team = array(
        'labels' => $labels_team,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessman',
        'query_var' => true,
        'rewrite' => array('slug' => 'our-team'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'revisions')
    );
    register_post_type('our-team', $args_team);
    
    $labels_portfolio = array(
        'name' => 'Portfolios',
        'singular_name' => 'Portfolio',
        'menu_name' => 'Portfolios',
        'name_admin_bar' => 'Portfolios',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Portfolio',
        'new_item' => 'New Portfolio',
        'edit_item' => 'Edit Portfolio',
        'view_item' => 'View Portfolio',
        'all_items' => 'All Portfolios',
        'search_items' => 'Search Portfolios',
        'parent_item_colon' => 'Parent Portfolios:',
        'not_found' => 'No Portfolio found.',
        'not_found_in_trash' => 'No Portfolios found in Trash.',
    );
    $args_portfolio = array(
        'labels' => $labels_portfolio,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'revisions')
    );
    register_post_type('portfolio', $args_portfolio);
    
    
}

add_action('init', 'my_custom_posttypes');

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    my_custom_posttypes();
    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'my_rewrite_flush');

include 'BFI_Thumb.php';
// bfi thumb function
function bfiThumb_src($imgPath, $width = null, $height = null) {
    if ($imgPath != '') {
        unset($params);
        unset($image_path);
        $params = array('width' => $width, 'height' => $height, 'crop' => true);
        $image_path = bfi_thumb($imgPath, $params);
        return $image_path;
    } else {
        return false;
    }
}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

function blog_posts_nav() {
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** 	Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /** 	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="navigation project_bottom_links"><ul>' . "\n";
    /** 	Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('Newer Posts &gt;'));
    /** 	Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('&lt; Older Posts '));
    echo '</ul></div>' . "\n";
}
add_filter('next_posts_link_attributes', 'nxt_link_attributes');
add_filter('previous_posts_link_attributes', 'pre_link_attributes');
function pre_link_attributes() {
    return 'class="pre-posts btn btn-primary"';
}
function nxt_link_attributes() {
    return 'class="nxt-posts btn btn-primary"';
}
function sweetwords_numeric_posts_nav() {
    if (is_singular())
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** 	Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /** 	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="navigation sweetwords"><ul>' . "\n";
    /** 	Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('&lt; Previous'));
    /** 	Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links))
            echo '<li>?</li>';
    }
    /** 	Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /** 	Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>?</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /** 	Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('Next &gt;'));
    echo '</ul></div>' . "\n";
}
/* ================= Pagination function ================== */
function pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
//        echo '<ul class="pagination pagination-sm">';
        echo '<ul class="pagination pagination-lg">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo; First</a></li>";
        if ($paged > 1)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&laquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li class=\"active\"><a href='#' class=''>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }
        if ($paged < $pages)
            echo "<li><a href=\"" . get_pagenum_link($paged + 1) . "\">&raquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a></li>";
        echo '</ul>';
    }
}

function sl_widgets_init() {    
    register_sidebar(array(
        'name' => __('Blog Sidebar'),
        'id' => 'blog-sidebar',
        'class' => 'footerCol firstCol',
        'description' => __('Widgets in this area will be shown in Blog Sidebar'),
        'before_widget' => '<div class="blogWidget widgetCont" >',
        'before_title' => '<h3 class="widgetTitle" click="0">',
        'after_title' => '</h3>',
        'after_widget' => '<div class="clear"></div></div>'
    ));
}

add_action('widgets_init', 'sl_widgets_init');

// FEATURED IMAGE SUPPORT 
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}