<?php
add_action('elementor/query/custom-query-filter', 'custom_remove_product_from_query');

/**
 *
 * @param WP_Query $query
 */
function custom_remove_product_from_query( $query ) {
    $post_types = get_elementor_query_post_types( $query );

    $post_types = array_diff( $post_types, ['product'] );

    $query->set( 'post_type', $post_types );
}

/**
 *
 * @param WP_Query $query
 * @return array
 */
function get_elementor_query_post_types( $query ) {
    $post_types = (array) $query->get( 'post_type' );

    if ( empty( $post_types ) || in_array('any', $post_types) ) {
        $post_types = ['post'];
    }

    return $post_types;
}
