<?php

namespace Reach\Components\Slider;

function filterArgs(array $args): ?array
{
    // -------------------------------------------------------------------------
    // Default arguments.
    // -------------------------------------------------------------------------
    $args = array_merge([
        'cards' => [],
        'classes' => [],
        'heading' => 'Hello World',
        'type' => 'default',
        'align' => 'alignwide',
        'break_container' => false,
        'items' => [],
        'background_colour' => '#FFF',
        'episodes' => [],
    ], $args);

    if ($args['break_container']) {
        $args['classes'][] = 'break-slider-container';
    }


    if (!empty($args['margin'])) {
        $args['attributes']['style']['--text-margin'] = implode(' ', $args['margin']);
    }
    if (!empty($args['padding'])) {
        $args['attributes']['style']['--text-padding'] = implode(' ', $args['padding']);
    }
    if (!empty($args['background_colour'])) {
        $args['attributes']['style']['--text-background-colour'] = $args['background_colour'];
    }
    if (!empty($args['text_colour'])) {
        $args['attributes']['style']['--text-text-colour'] = $args['text_colour'];
    }
    if (!empty($args['column_size'])) {
        $args['attributes']['style']['--text-column-size'] = $args['column_size'];
    }
    if (!empty($args['text_align'])) {
        $args['attributes']['style']['--text-text-align'] = $args['text_align'];
    }
    // -------------------------------------------------------------------------
    // Required classes.
    // -------------------------------------------------------------------------
    $args['classes'] = array_merge([
        'slider',
        'wp-block',
    ], $args['classes']);

    if (!empty($args['top_header'])) {
        $args['top_header'] = [
            'top_header' => $args['top_header'],
            'classes' => ['slider__top-header'],
        ];

    }


    if($args['slider_type'] === 'Seasons') {

        $options  = [
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC',
        ];
        
        $episodes = new \WP_Query($options);
        
        if ($episodes->have_posts()) {
            while ($episodes->have_posts()) {
                $episodes->the_post(); 
                
                $args['items'][] = [
                    'title'       => get_field('episode_title', get_the_ID()),
                    'description' => get_field('episode_description',get_the_ID()),
                    'image'       => get_field('episode_image', get_the_ID()),
                    'duration'    => get_field('episode_duration', get_the_ID()),
                    'date'        => get_field('episode_date', get_the_ID()),
                    'link'        => get_field('episode_link', get_the_ID() ),
                ];
        
                // Add card color if specified
                if (!empty($args['card_color'])) {
                    $args['items'][array_key_last($args['items'])]['card_color'] = $args['card_color'];
                }
            }
            wp_reset_postdata(); // Reset the global post data
        }
    }


    // Process `items` and add additional properties.
    if (!empty($args['items'])) {
        foreach ($args['items'] as $key => $card) {
            $args['items'][$key] = array_merge([
                'slider' => true,
                'type' => $args['type'],
            ], $card);
        }
    }



    if(!empty($args['episodes'])) {
        $args['items'] = $args['episodes'];


        if (!empty($args['card_color'])) {
            foreach ($args['items'] as $key => $card) {
                $args['items'][$key]['card_color'] = $args['card_color'];
            }
        }
    }

    // Add column-specific classes.
    if (!empty($args['columns']) && $args['columns'] !== 'default') {
        $args['classes'][] = 'cards--columns-' . $args['columns'];
    }

    // Adjust classes based on `align` and `slider_on_mobile`.
    if ($args['align'] !== 'full') {
        $args['slider_on_mobile'] = false;
    }

    $args['classes'][] = 'cards--type--' . $args['type'];
    $args['classes'][] = !empty($args['slider_on_mobile']) ? 'cards--slider-on-mobile' : null;

    // -------------------------------------------------------------------------
    // Return the filtered args.
    // -------------------------------------------------------------------------



    // echo '<pre>';
    // print_r($args);
    // echo '</pre>';


 return $args;
}