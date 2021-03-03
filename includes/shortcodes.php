<?php

function mbn_shortcode_home_url($atts = null, $content = null){
    return home_url();
}
add_shortcode('home_url', 'mbn_shortcode_home_url');


// Find Us Location, Map
function find_us_gmap() { 
    wp_reset_query();
    $locArgs = array('post_type' => 'location', 'posts_per_page' => -1, 'post_status' => 'publish','orderby' => 'title', 'order' => 'ASC');
    $locLoop = new WP_Query( $locArgs ); ?>
    <div class="location_map">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE&callback=initMap&libraries=&v=weekly" defer></script>

    <script>function initMap() {
        const myLatlng = { lat: 34.750713, lng: -111.263263 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatlng,
        });
    
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();  
        var markers_array = new Array(), locations = [], array_holder, loc_content = "", loc_ctr = 0, emp_phones = "";
    
        <?php while ( $locLoop->have_posts() ) : $locLoop->the_post(); ?>
            <?php if(!empty(get_field('map_location'))): ?>
            var loc_title = '<?php the_title(); ?>';
            var office_lat = <?php echo get_field('map_location')['lat']; ?>; 
            var office_lng = <?php echo get_field('map_location')['lng']; ?>; 

            loc_content = '<div id="mapInfo'+loc_ctr+'" class="map_info">';
            loc_content += '' +loc_title+ '';
            loc_content += '</div>';
            loc_content += '</div>';
    
            array_holder = [loc_title, office_lat, office_lng, loc_content];
            locations.push(array_holder);
            
            loc_ctr = loc_ctr+1;

            <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
        
        
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
    
        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);
      
        //(optional) restore the zoom level after the map is done scaling
        var listener = google.maps.event.addListener(map, "idle", function () {
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
    <div id="map" style="height:100vh"></div>
    </div>



    <p class="note">
        <strong>NOTE:</strong> 
        The map and cities below show the general geographic locations for the retail stores. Exact locations will be determined at a later date.
    </p>

    <?php 
    }
add_shortcode('display_locations_gmap', 'find_us_gmap');






