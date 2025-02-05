<?php

/**
 * Registers the 'Location' custom taxonomy and handles related functionality.
 */

namespace Theme\Taxonomies;

class Location
{
    protected const SLUG = 'location';

    public static function init(): void
    {
        \add_action('init', [__CLASS__, 'registerTaxonomy']);
        \add_filter('reach/templates/taxonomies', [__CLASS__, 'filterReachTemplatesTaxonomies']);
    }

    /**
     * Register Taxonomy.
     *
     * @link https://github.com/johnbillion/extended-cpts/wiki/Registering-taxonomies
     */
    public static function registerTaxonomy(): void
    {
        if (!function_exists('register_extended_taxonomy')) {
            return;
        }

        \register_extended_taxonomy(
            self::SLUG,
            [
                'event',
            ],
            [
                // Core taxonomy configuration.
                'hierarchical'      => true,
                'show_admin_column' => true,
                'show_in_rest'      => true,

                // Extended taxonomy configuration.
                'meta_box'         => 'simple',
                'exclusive'        => true, // Only one can be selected.
                'required'         => true,
                'dashboard_glance' => true,
            ],
            [
                // Override the base names used for labels (optional).
                'singular' => \__('Location', 'reach'),
                'plural'   => \__('Locations', 'reach'),
                'slug'     => self::SLUG,
            ]
        );
    }

    /**
     * Filter the Reach Templates Taxonomies array to enable Template Pages for this taxonomy.
     *
     * @see /Reach/WordPress/TemplatePage.php
     *
     * @return array The filtered taxonomy array.
     */
    public static function filterReachTemplatesTaxonomies($taxonomies): array
    {
        $taxonomies[] = self::SLUG;
        return $taxonomies;
    }
}
