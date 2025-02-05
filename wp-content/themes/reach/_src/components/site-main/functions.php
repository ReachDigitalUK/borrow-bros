<?php

namespace Reach\Components\SiteMain;

function filterArgs(array $args): ?array
{
    // ---------------------------------------
    // Default arguments.
    // ---------------------------------------
    $args = array_merge([
        'classes' => [],
        'inner_el' => 'div',
    ], $args);

    // ---------------------------------------
    // Required classes.
    // ---------------------------------------
    $args['classes'] = array_merge([
        'site-main',
    ], $args['classes']);

    if (!empty($args['object'])) {
        // Use the <article> wrapper on specific post type(s).
        if ($args['object'] instanceof \WP_Post && \get_post_type($args['object']) === 'post') {
            $args['inner_el'] = 'article';
        }

        // Display default header if one isn't added in the content.
        // if (!\has_block('acf/page-header')) {
        //     $args['header'] = \Reach\Component::get('page-header', [
        //         'object' => $args['object'],
        //     ]);
        // }
    }

    if (empty($args['id']) && empty($args['attributes']['id'])) {
        $args['attributes']['id'] = 'main';
    }

    // -------------------------------------------------------------------------
    // Return the filtered args.
    // -------------------------------------------------------------------------
    return $args;
}
