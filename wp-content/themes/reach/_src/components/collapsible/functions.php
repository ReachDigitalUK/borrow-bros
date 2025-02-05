<?php

namespace Reach\Components\Collapsible;

function filterArgs(array $args): ?array
{
    // -------------------------------------------------------------------------
    // Default arguments.
    // -------------------------------------------------------------------------
    $args = array_merge([
        'classes' => [],
        'margin' => ['1rem', '0rem', '1rem', '0rem'],
        'padding' => ['0rem', '0rem', '0rem', '0rem'],
        'image_border_radius' => ['0rem', '0rem', '0rem', '0rem'],
    ], $args);

    // -------------------------------------------------------------------------
    // Required classes.
    // -------------------------------------------------------------------------
    $args['classes'] = array_merge([
        'collapsible',
        'wp-block',
    ], $args['classes']);

    // -------------------------------------------------------------------------
    // Styling Tabs
    // -------------------------------------------------------------------------
    if (!empty($args['margin'])) {
        $args['attributes']['style']['--collapsible-margin'] = implode(' ', $args['margin']);
    }
    if (!empty($args['padding'])) {
        $args['attributes']['style']['--collapsible-padding'] = implode(' ', $args['padding']);
    }
    if (!empty($args['background_colour'])) {
        $args['attributes']['style']['--collapsible-background-colour'] = $args['background_colour'];
    }
    if (!empty($args['text_colour'])) {
        $args['attributes']['style']['--collapsible-text-colour'] = $args['text_colour'];
    }
    if (!empty($args['link_colour'])) {
        $args['attributes']['style']['--collapsible-text-colour'] = $args['link_colour'];
    }
    if (!empty($args['image_border_radius'])) {
        $args['attributes']['style']['--collapsible-image-border-radius'] = implode(' ', $args['image_border_radius']);
    }

    // -------------------------------------------------------------------------
    // Return the filtered args.
    // -------------------------------------------------------------------------
    return $args;
}
