<?php

namespace Reach\Components\Element;

function filterArgs(array $args): ?array
{
    // ---------------------------------------
    // Default arguments.
    // ---------------------------------------
    $args = array_merge([
        'el' => 'span',
        'classes' => [],
        'content' => '',
        'content_filter' => 'wp_kses_post',
    ], $args);

    // Enforce empty void element content.
    if (isVoidElement($args['el'])) {
        unset($args['content']);
    }

    if (empty($args['content_filter']) || !is_callable($args['content_filter'])) {
        $args['content_filter'] = fn($content) => $content;
    }

    // -------------------------------------------------------------------------
    // Return the filtered args.
    // -------------------------------------------------------------------------
    return $args;
}

/**
 * Determines whether an HTML element is a void element (i.e. an element that cannot have any child nodes).
 *
 * @link https://developer.mozilla.org/en-US/docs/Glossary/Void_element
 *
 * @param string $tag The HTML element tag name.
 * @return boolean Whether the HTML element is a void element.
 */
function isVoidElement(string $tag): bool
{
    return !empty($tag) && in_array($tag, [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param', // Deprecated.
        'source',
        'track',
        'wbr',
    ], true);
}
