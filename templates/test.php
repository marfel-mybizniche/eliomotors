<?php

/* Template Name: Location template */

get_header(); ?>

<ul class="locations-by-tax">
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

    echo '<li class="prodbytax-item '. $location_category->slug .'">';
    echo '<h4 class="prodtax-head">' . $location_category->name . '</h4>';
    //if($locations->found_posts > 0) {
        echo "<ul class='location-list'>";
        while ( $locations->have_posts() ) {
            $locations->the_post();
            $terms = get_the_terms( $post->ID, 'location-apps' );
            
            ?>
            <li class="<?php if($terms) foreach( $terms as $term ) echo ' '.$term->slug; ?>">
                <div class="location-list-item">
                    <h6><?php the_title(); ?></h6>
                </div>
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


<?php get_footer() ?>