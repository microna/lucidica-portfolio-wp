<?php 
function get_lucidica_portfolio_styles() {
    wp_enqueue_style(
        'lucidica-portfolio-styles', // Handle
        get_stylesheet_directory_uri() . '/style.css', // Path to style.css in root folder
        array(), // Dependencies
        filemtime(get_stylesheet_directory() . '/style.css'), // Version based on file modification time
        'all' // Media
    );
    
    // Add inline styles with WordPress image paths
    $theme_image_path = get_stylesheet_directory_uri() . '/img';
    $custom_css = "
        :root {
            --theme-url: '" . get_stylesheet_directory_uri() . "';
            --img-url: '" . $theme_image_path . "';
        }
        .button-primary:after {
            background-image: url({$theme_image_path}/arrow_forward.svg);
        }
        .button-secondary:after {
            background-image: url({$theme_image_path}/arrow-forward-white.svg);
        }
        .projects__content-text:after, 
        .impact__content-title:after,
        .project-item__title:after {
            background-image: url({$theme_image_path}/blue-underline.svg);
        }
        .conclusions {
            background-image: url({$theme_image_path}/logo_horizontal.svg);
        }
    ";
    wp_add_inline_style('lucidica-portfolio-styles', $custom_css);
}

function get_lucidica_portfolio_scripts() {
    wp_enqueue_script(
        'lucidica-portfolio-scripts', // Handle
        get_stylesheet_directory_uri() . '/scripts.js', // Path to scripts.js in root folder
        array('jquery'), // Dependencies - include jQuery
        '1.0.0', // Version
        true // Load in footer (true) or head (false)
    );
}

/**
 * Fix CSS background image URLs
 * Replace relative paths in CSS with absolute paths to WordPress theme directory
 */
function lucidica_fix_background_image_urls($tag, $handle, $src) {
    // Only modify our theme's stylesheet
    if ($handle === 'lucidica-portfolio-styles') {
        $css_file = get_stylesheet_directory() . '/style.css';
        $css_content = file_get_contents($css_file);
        $fixed_css = str_replace('url(./img/', 'url(' . get_stylesheet_directory_uri() . '/img/', $css_content);
        
        // Create a temporary file with the fixed CSS
        $upload_dir = wp_upload_dir();
        $temp_file = $upload_dir['basedir'] . '/lucidica-fixed-style.css';
        file_put_contents($temp_file, $fixed_css);
        
        // Return tag pointing to the fixed CSS with version parameter
        $version = filemtime($css_file);
        $cached_url = $upload_dir['baseurl'] . '/lucidica-fixed-style.css?ver=' . $version;
        return str_replace($src, $cached_url, $tag);
    }
    return $tag;
}
add_filter('style_loader_tag', 'lucidica_fix_background_image_urls', 10, 3);

// Register Custom Post Type for Projects
function lucidica_register_projects_post_type() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'lucidica-portfolio' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'lucidica-portfolio' ),
        'menu_name'             => __( 'Projects', 'lucidica-portfolio' ),
        'name_admin_bar'        => __( 'Project', 'lucidica-portfolio' ),
        'archives'              => __( 'Project Archives', 'lucidica-portfolio' ),
        'attributes'            => __( 'Project Attributes', 'lucidica-portfolio' ),
        'parent_item_colon'     => __( 'Parent Project:', 'lucidica-portfolio' ),
        'all_items'             => __( 'All Projects', 'lucidica-portfolio' ),
        'add_new_item'          => __( 'Add New Project', 'lucidica-portfolio' ),
        'add_new'               => __( 'Add New', 'lucidica-portfolio' ),
        'new_item'              => __( 'New Project', 'lucidica-portfolio' ),
        'edit_item'             => __( 'Edit Project', 'lucidica-portfolio' ),
        'update_item'           => __( 'Update Project', 'lucidica-portfolio' ),
        'view_item'             => __( 'View Project', 'lucidica-portfolio' ),
        'view_items'            => __( 'View Projects', 'lucidica-portfolio' ),
        'search_items'          => __( 'Search Project', 'lucidica-portfolio' ),
        'not_found'             => __( 'Not found', 'lucidica-portfolio' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'lucidica-portfolio' ),
        'featured_image'        => __( 'Project Image', 'lucidica-portfolio' ),
        'set_featured_image'    => __( 'Set project image', 'lucidica-portfolio' ),
        'remove_featured_image' => __( 'Remove project image', 'lucidica-portfolio' ),
        'use_featured_image'    => __( 'Use as project image', 'lucidica-portfolio' ),
    );
    
    $args = array(
        'label'                 => __( 'Project', 'lucidica-portfolio' ),
        'description'           => __( 'Portfolio Projects', 'lucidica-portfolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true, // Enables Gutenberg editor
        'rewrite'               => array( 'slug' => 'projects' ),
    );
    
    register_post_type( 'project', $args );
}

// Register Project Categories Taxonomy
function lucidica_register_project_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'lucidica-portfolio' ),
        'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'lucidica-portfolio' ),
        'menu_name'                  => __( 'Project Categories', 'lucidica-portfolio' ),
        'all_items'                  => __( 'All Categories', 'lucidica-portfolio' ),
        'parent_item'                => __( 'Parent Category', 'lucidica-portfolio' ),
        'parent_item_colon'          => __( 'Parent Category:', 'lucidica-portfolio' ),
        'new_item_name'              => __( 'New Category Name', 'lucidica-portfolio' ),
        'add_new_item'               => __( 'Add New Category', 'lucidica-portfolio' ),
        'edit_item'                  => __( 'Edit Category', 'lucidica-portfolio' ),
        'update_item'                => __( 'Update Category', 'lucidica-portfolio' ),
        'view_item'                  => __( 'View Category', 'lucidica-portfolio' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'lucidica-portfolio' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'lucidica-portfolio' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'lucidica-portfolio' ),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    
    register_taxonomy( 'project-category', array( 'project' ), $args );
}

add_theme_support('post-thumbnails');
add_image_size('project-thumbnail', 320, 200, true);
// Hook the functions to WordPress
add_action('wp_enqueue_scripts', 'get_lucidica_portfolio_styles');
add_action('wp_enqueue_scripts', 'get_lucidica_portfolio_scripts');
add_action('init', 'lucidica_register_projects_post_type');
add_action('init', 'lucidica_register_project_taxonomy');
?>