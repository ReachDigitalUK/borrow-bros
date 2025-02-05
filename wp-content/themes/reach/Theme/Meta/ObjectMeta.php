<?php

namespace Theme\Meta;

class ObjectMeta
{
    public static function getObjectMeta($object): array
    {
        if ($object instanceof \WP_Post) {
            $return['date'] = self::getObjectDate(\get_option('date_format'), $object);

            $return['author'] = self::getObjectAuthor($object);

            $taxonomies = [];

            if ($object->post_type === 'post') {
                $taxonomies[] = 'category';
            }
        }

        $return['labels'] = self::getObjectLabels($object, [
            'taxonomies' => $taxonomies,
        ]);

        return $return;
    }

    public static function getObjectDate($object)
    {
        return \get_the_date(\get_option('date_format'), $object) ?? null;
    }

    public static function getObjectAuthor($object)
    {
        if (empty($object->post_author)) {
            return false;
        }

        return [
            'title' => \get_the_author_meta('display_name', $object->post_author),
            'url' => \get_author_posts_url($object->post_author),
        ];
    }

    // Returns an array of labels. Each with Name, Url and Taxonomy/type
    public static function getObjectLabels($object, $args = [])
    {
        $args = array_merge([
            'limit' => 0,
            'taxonomies' => [],
        ], $args);

        $labels = [];

        if (!empty($args['taxonomies'])) {
            $siteTaxonomies = $args['taxonomies'];
        } else {
            $siteTaxonomies = [
                'post_tag',
                'category'
            ];
        }

        foreach ($siteTaxonomies as $tax) {
            $terms = \get_the_terms($object, $tax);

            if (!empty($terms)) {
                if ($args['limit']) {
                    $terms = array_slice($terms, 0, $args['limit']);
                }

                foreach ($terms as $term) {
                    $labels[] = self::getTermLabels($term, $tax);
                }
            }
        }

        return $labels;
    }

    /**
     * Returns an array of data for a taxonomy term. Each with Name, Url and Taxonomy/type
     */
    public static function getTermLabels($term, $taxonomy)
    {
        $term = \get_term($term, $taxonomy, ARRAY_A);

        if (empty($term) || \is_wp_error($term)) {
            return [];
        }

        // Add permalink to term object array.
        $term['url'] = \get_term_link($term['term_id'], $taxonomy);

        return $term;
    }
}
