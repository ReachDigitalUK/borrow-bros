<?php

/**
 * Registers 'Event' CPT & handles related functionality.
 */

namespace Theme\PostTypes;

class Event
{
    protected const SLUG = 'event';

    public static function init(): void
    {
        \add_action('init', [__CLASS__, 'registerPostType']);
        \add_action('acf/init', [__CLASS__, 'addSettingsPage']);
        \add_filter('reach/templates/post-types', [__CLASS__, 'filterReachTemplatesPostTypes']);
    }

    /**
     * Register CPT.
     *
     * @link https://github.com/johnbillion/extended-cpts/wiki/Registering-Post-Types
     */
    public static function registerPostType(): void
    {
        if (!function_exists('register_extended_post_type')) {
            return;
        }

        \register_extended_post_type(self::SLUG, [
            // Core post type configuration.
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'show_in_rest' => true,
            'menu_position' => 25, // Below comments.
            'menu_icon' => 'dashicons-calendar',
            'enter_title_here' => 'Event Name',
            'supports' => [
                'title',
                'editor',
                'excerpt',
                'revisions',
                'thumbnail',
                'author',
                'custom-fields',
            ],
            'taxonomies' => [
                'location',
            ],
            'template' => [
                [
                    'core/paragraph',
                    [
                        'placeholder' => 'Add content...',
                    ]
                ]
            ],

            // Extended post type configuration.
            'admin_filters' => [
                'location' => [
                    'taxonomy' => 'location',
                ],
            ],
            'admin_cols' => [
                'thumbnail' => [
                    'title'          => 'Thumbnail',
                    'featured_image' => 'thumbnail',
                    'width'          => 80,
                    'height'         => 80,
                ],
                'title' => [
                    'title' => 'Title',
                ],
                'author' => [
                    'title' => 'Author',
                ],
                'location' => [
                    'taxonomy' => 'location',
                ],
                'updated' => [
                    'title'      => 'Updated',
                    'post_field' => 'post_modified',
                    'date_format' => 'Y/m/d \a\t H:i a',
                ],
            ],
        ], [
            // Override the base names used for labels (optional).
            'singular' => \__('Event', 'reach'),
            'plural'   => \__('Events', 'reach'),
            'slug'     => self::SLUG,
        ]);
    }

    /**
     * Adds an ACF settings page for this post type.
     */
    public static function addSettingsPage(): void
    {
        if (!function_exists('acf_add_options_sub_page')) {
            return;
        }

        \acf_add_options_sub_page([
            'page_title'  => \__('Events Settings', 'reach'),
            'menu_title'  => \__('Events Settings', 'reach'),
            'menu_slug'   => 'acf-options-events-settings',
            'parent_slug' => 'edit.php?post_type=' . self::SLUG,
        ]);
    }

    /**
     * Filter the Reach Templates Post Types array to enable Template Pages for this post type.
     *
     * @see /Reach/WordPress/TemplatePage.php
     *
     * @return array The filtered post type array.
     */
    public static function filterReachTemplatesPostTypes($postTypes)
    {
        $postTypes[] = self::SLUG;
        return $postTypes;
    }
}
