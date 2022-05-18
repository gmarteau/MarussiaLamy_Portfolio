<?php

function marussialamy_support() {
    $logoDefaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support('custom-logo', $logoDefaults);
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Header menu');
    register_nav_menu('categories', 'Project categories menu');
    register_nav_menu('social', 'Social media menu');
    add_image_size('archive-thumbnail', 1000, 1000, true);
}

function marussialamy_register_assets() {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_style('helvetica-neue', '//db.onlinewebfonts.com/c/37eca625db586fe250cb8494b60fa092?family=Helvetica+Neue+LT+Pro');
    wp_register_style('marussialamy-style', get_template_directory_uri() . '/style.css', ['helvetica-neue', 'bootstrap'], rand(111,9999), 'all');
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', ['popper'], false, true);
    wp_register_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', [], false, true);
    wp_register_script('jquery-lettering', get_template_directory_uri() . '/assets/js/jquery.lettering.min.js', ['jquery-min'], false, true);
    wp_register_script('swup', 'https://unpkg.com/swup@latest/dist/swup.min.js', [], false, true);
    wp_register_script('swup-scripts-plugin', get_template_directory_uri() . '/node_modules/@swup/scripts-plugin/dist/SwupScriptsPlugin.min.js', [], false, true);
    wp_register_script('swup-init', get_template_directory_uri() . '/assets/js/swup-init.js', ['swup', 'swup-scripts-plugin'], false, true);
    wp_register_script('page-checker', get_template_directory_uri() . '/assets/js/page-checker.js', [], false, true);

    if (is_page('about') || is_singular('project')) {
        wp_register_script('scroll-down-elt', get_template_directory_uri() . '/assets/js/scroll-down-elt.js', ['jquery-lettering'], false, true);
        
        wp_enqueue_script('scroll-down-elt');    
    }

    if (is_singular('project')) {
        wp_register_script('single-project-anim', get_template_directory_uri() . '/assets/js/single-project-anim.js', [], false, true);

        wp_enqueue_script('single-project-anim');
    }

    if (is_archive()) {
        wp_register_script('archive-anim', get_template_directory_uri() . '/assets/js/archive-anim.js', [], false, true);
        
        wp_enqueue_script('archive-anim');
    }

    if (!is_page('contact')) {
        wp_register_script('footer-anim', get_template_directory_uri() . '/assets/js/footer-anim.js', [], false, true);
        
        wp_enqueue_script('footer-anim');
    }

    if (is_page('about')) {
        wp_register_script('about-anim', get_template_directory_uri() . '/assets/js/about-anim.js', [], false, true);
        
        wp_enqueue_script('about-anim');
    }

    if (is_page('contact')) {
        wp_register_script('contact-anim', get_template_directory_uri() . '/assets/js/contact-anim.js', [], false, true);
        
        wp_enqueue_script('contact-anim');
    }

    wp_enqueue_style('marussialamy-style');
    wp_enqueue_script('jquery-min');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('swup-init');
    wp_enqueue_script('page-checker');
}

function marussialamy_handle_swup_scripts( $tag, $handle, $source ) {
    if ( 'swup' === $handle ) {
        $tag = '<script type="text/javascript" src="' . $source . '" id="swup-js" data-swup-ignore-script=true></script>';
        return $tag;
    }
    if ( 'swup-init' === $handle ) {
        $tag = '<script type="text/javascript" src="' . $source . '" id="swup-init-js" data-swup-ignore-script=true></script>';
        return $tag;
    }
    return $tag;
}

function marussialamy_init() {
    register_post_type('project', [
        'labels' => [
            'name' => 'Projet',
            'singular_name' => 'Projet',
            'plural_name' => 'Projets',
            'search_items' => 'Rechercher des projets',
            'all_items' => 'Tous les projets',
            'edit_item' => 'Editer le projet',
            'update_item' => 'Mettre à jour le projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'new_item_name' => 'Nouveau projet',
            'menu_name' => 'Projets',
            'not_found' => 'Pas de projet trouvé'
        ],
        'description' => 'Projet de design',
        'taxonomies' => ['skill'],
        'public' => true,
        'menu_position' => (int)4,
        'menu_icon' => 'dashicons-hammer',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'projets'
        ]
    ]);
    register_taxonomy('skill', 'project', [
        'labels' => [
            'name' => 'Skill',
            'singular_name' => 'Skill',
            'plural_name' => 'Skills',
            'search_items' => 'Rechercher des skills',
            'all_items' => 'Toutes les skills',
            'edit_item' => 'Editer skill',
            'update_item' => 'Mettre à jour skill',
            'add_new_item' => 'Ajouter une nouvelle skill',
            'new_item_name' => 'Nouvelle skill',
            'menu_name' => 'Skills',
            'not_found' => 'Pas de skill trouvée'
        ],
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => [
            'slug' => 'portfolio'
        ]
    ]);
}

add_action('init', 'marussialamy_init');
add_action('after_setup_theme', 'marussialamy_support');
add_action('wp_enqueue_scripts', 'marussialamy_register_assets');

add_filter( 'script_loader_tag', 'marussialamy_handle_swup_scripts', 10, 3);