<?php

namespace Reach\Components\PostSummaries\Item;

function filterArgs(array $args): ?array
{
    // -------------------------------------------------------------------------
    // Default arguments.
    // -------------------------------------------------------------------------
    $args = array_merge([
        'classes' => [],
        'heading' => [],
        'image' => null,
        'content' => '',
        'object' => null,
    ], $args);

    // ---------------------------------------
    // Bail early - return null for no output.
    // ---------------------------------------
    if (empty($args['object']) || (!$args['object'] instanceof \WP_Post)) {
        return null;
    }

    // -------------------------------------------------------------------------
    // Required classes.
    // -------------------------------------------------------------------------
    $args['classes'] = array_merge([
        'post-summary',
        'post-summaries__item',
    ], $args['classes']);

    /** @var object $object */
    $object = $args['object'];

    $args['heading'] = [
        'heading' => \get_the_title($object->ID),
        'classes' => ['post-summary__heading'],
        'link' => \get_the_permalink($object->ID),
    ];

    $args['content'] = \get_the_excerpt($object->ID);

    if (\has_post_thumbnail($object->ID)) {
        $args['image'] = [
            'ID' => \get_post_thumbnail_id($object->ID),
        ];

        $args['classes'][] = 'has-image';
    }

    // -------------------------------------------------------------------------
    // Return the filtered args.
    // -------------------------------------------------------------------------
    return $args;
}
