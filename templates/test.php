<?php

/* Template Name: Location template */

get_header(); ?>


<div class="location_map">
    <?= do_shortcode('[display_loc_gmap]'); ?>
</div>

<ul class="location_states">
<?php
    $location_categories = get_terms( 'locations-cat', array(
        'orderby'    => 'title',
        'order'      => 'ASC',
        'parent' => 0,
        'hide_empty' => true
    ));

    foreach ( $location_categories as $location_category ) {
        
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'locations-cat',
                    'field' => 'slug',
                    'terms' => $location_category->slug,
                    'include_children' => false
                )
            ),
            'post_type' => 'location',
            'orderby' => 'title,'
        );
        $locations = new WP_Query( $args );

        $getTermChildCount = count (get_term_children( $location_category->term_id, 'locations-cat' )); // Count Sub Categories
        $postCount = $locations->found_posts; // Count Post

        if($getTermChildCount < 1 and $postCount > 0) {

        echo '<li class="state_item '. $location_category->slug .'">';
        echo '<h6 class="state_name">'. $location_category->name .'</h6>';
        //if($locations->found_posts > 0) {
            echo "<ul class='location_list'>";
            while ( $locations->have_posts() ) {
                $locations->the_post();
                $terms = get_the_terms( $post->ID, 'location-apps' );

                ?>
                <li class="city_item">
                    <a href="#"><?php the_title(); ?></a>
                </li>
                <?php
            }
            echo "</ul>";
        //}
        //echo "<p class='no-results'>No location/s Found</p>";
        echo "</li>";

        }
    }
?>
</ul>

<p class="note">
    <strong>NOTE:</strong> 
    The map and cities below show the general geographic locations for the retail stores. Exact locations will be determined at a later date.
</p>

<?php get_footer() ?>