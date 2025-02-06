<?php

namespace Reach\Components\Season;

function filterArgs(array $args): ?array
{
    // -------------------------------------------------------------------------
    // Default arguments.
    // -------------------------------------------------------------------------
    $args = array_merge([
        'classes' => [],
        'heading' => 'Hello World',
        'items' => [],
    ], $args);

    // -------------------------------------------------------------------------
    // Required classes.
    // -------------------------------------------------------------------------
    $args['classes'] = array_merge([
        'season',
        'wp-block',
    ], $args['classes']);

    if (!empty($args['heading'])) {
        $args['heading'] = [
            'heading' => $args['heading'],
            'classes' => ['season__heading'],
        ];
    }

    if (!empty($args['season'])) {

        $options = [
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'category_name'  => $args[0]['season']['slug'],
            'order'        => 'ASC',
        ];





        
    $query = new \WP_Query($options);


    if ($query->have_posts()) {
        $args['items'] = [];
    
        while ($query->have_posts()) {
            $query->the_post(); 
    
            $args['items'][] = [
                'title'       => get_field('episode_title', get_the_ID()),
                'description' => get_field('episode_description', get_the_ID()),
                'image'       => get_field('episode_image', get_the_ID()),
                'duration'    => get_field('episode_duration', get_the_ID()),
                'date'        => get_field('episode_date', get_the_ID()),
                'link'        => get_field('episode_link', get_the_ID()),
            ];
        }
        wp_reset_postdata(); // Reset global post data
    }

    
    
    $totalItems = count($args['items']);
    
    if ($totalItems >= 3) {
        $lastItem = array_pop($args['items']); 
        $secondLastItem = array_pop($args['items']); 
        $thirdLastItem = array_pop($args['items']); 
    
        $lastThreeItems = [$thirdLastItem, $secondLastItem, $lastItem]; 

        $args['last_item'] = $lastItem;
        $args['second_last_item'] = $secondLastItem;
        $args['third_last_item'] = $thirdLastItem;

        $args['middle'] = [$secondLastItem, $thirdLastItem]; 
        
    } else {
        $lastThreeItems = $args['items']; 
        $args['items'] = [];
    }
    




    // echo '<pre>';
    // print_r($args['items']);
    // echo '</pre>';



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
    // Return the filtered args.
    // -------------------------------------------------------------------------
    return $args;
}
