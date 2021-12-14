<?php

function marussialamy_support() {
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
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', ['popper'], false, true);
    wp_register_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', [], false, true);

    wp_enqueue_style('marussialamy-style');
    wp_enqueue_style('font-awesome');
    wp_enqueue_script('bootstrap');
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