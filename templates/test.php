<?php

/* Template Name: Location template */

get_header(); ?>

<?php 
$locArgs = array('post_type' => 'location', 'posts_per_page' => -1, 'post_status' => 'publish','orderby' => 'title', 'order' => 'ASC');
    $locLoop = new WP_Query( $locArgs ); ?>
    
    <div class="location_map">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE&callback=initMap&libraries=&v=weekly" defer></script>

    <script>function initMap() {
        const myLatlng = { lat: 34.750713, lng: -111.263263 };
        const map = new google.maps.Map(document.getElementById('gmap'), {
            zoom: 8,
            center: myLatlng,
        });
    
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();  
        var markers_array = new Array(), locations = [], array_holder, loc_content = '', loc_ctr = 0, emp_phones = '';
    
       <?php while ( $locLoop->have_posts() ) : $locLoop->the_post();  
            if(!empty(get_field('map_location'))): ?>

                var loc_title = '<?php the_title(); ?>';
                var office_lat = <?php echo get_field('map_location')['lat']; ?>; 
                var office_lng = <?php echo get_field('map_location')['lng']; ?>; 

             loc_content = '<div id="mapInfo<?php the_ID()?>">';
             loc_content += '' +loc_title+ '';
             loc_content += '</div>';
    
             array_holder = [loc_title, office_lat, office_lng, loc_content];
            locations.push(array_holder);
            
            loc_ctr = loc_ctr+1;

           <?php  
            endif;   
        endwhile; 
        wp_reset_postdata(); ?>
        
          for (var i = 0; i < locations.length; i++) {
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });
    
           bounds.extend(marker.position);
    
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][3]);
              infowindow.open(map, marker);
              map.setCenter(this.getPosition());
            }
          })(marker, i));
    
          markers_array.push(marker);
        }
    
        map.fitBounds(bounds);
      
        var listener = google.maps.event.addListener(map, 'idle', function () {
            map.setZoom(8);
            google.maps.event.removeListener(listener);
        });
    
        $('a.triggerMap').each(function(i){
            $(this).on('click', function(e){
                //e.preventDefault();
                google.maps.event.trigger(markers_array[i], 'click');
            });
        });
     
    }</script>
    
    <div id="gmap" style="height:100vh"></div>
    
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

        echo '<li class="state_item '. $location_category->slug .'">';
        echo '<h6 class="state_name">'. $location_category->name .'</h6>';
            echo "<ul class='location_list'>";
            while ( $locations->have_posts() ) {
                $locations->the_post();
                $terms = get_the_terms( $post->ID, 'location-apps' );

                ?>
                <li class="city_item">
                    <a href="<?php $wp_query->post_count; ?>"><?php the_title(); ?></a>
                </li>
                <?php
            }
            echo "</ul>";
        echo "</li>";

    }
?>
</ul>

<p class="note">
    <strong>NOTE:</strong> 
    The map and cities below show the general geographic locations for the retail stores. Exact locations will be determined at a later date.
</p>

<?php get_footer() ?>