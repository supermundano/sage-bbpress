<?php

namespace App;

if ( !defined( 'ABSPATH' ) ) exit;

if( class_exists( 'bbpress' ) ) {

    //We always return the page template to render bbpress pages
    add_filter('bbp_template_include', function ($template){

        return get_page_template();

    }, 100, 1);

    //To be able to override bbpress templates with blade templates in Sage
    add_filter('bbp_get_template_part', function ($templates, $slug, $name) {

        $theme_template = '';
        foreach ($templates as $template) {
            $theme_template = locate_template("views/bbpress/{$template}");
            if( !empty( $theme_template ) )
                break;
        }

        if ($theme_template) {
            $data = collect(get_body_class())->reduce(function ($data, $class) {
                return apply_filters("sage/template/{$class}/data", $data);
            }, []);

            echo template($theme_template, $data);
            return get_stylesheet_directory() . '/index.php';
        }

        return $templates;

    }, PHP_INT_MAX, 3);
}