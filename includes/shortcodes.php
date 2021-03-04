<?php

function mbn_shortcode_home_url($atts = null, $content = null){
    return home_url();
}
add_shortcode('home_url', 'mbn_shortcode_home_url');


function find_us_gmap() { 

    $locArgs = array('post_type' => 'location', 'posts_per_page' => -1, 'post_status' => 'publish','orderby' => 'title', 'order' => 'ASC');
    $locLoop = new WP_Query( $locArgs ); 
    $postvar = "";
    $postvar .='<div class="location_map">';
    $postvar .='<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
    $postvar .='<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE&callback=initMap&libraries=&v=weekly" defer></script>';

    $postvar .="<script>function initMap() {
        const myLatlng = { lat: 34.750713, lng: -111.263263 };
        const map = new google.maps.Map(document.getElementById('gmap'), {
            zoom: 2,
            center: myLatlng,
            styles: [{'featureType': 'administrative','elementType': 'all','stylers': [{'saturation': '-100'}]},
            {'featureType': 'administrative.province', 'elementType': 'all','stylers': [ {'visibility': 'off'}]},
            {'featureType': 'landscape', 'elementType': 'all','stylers': [{'saturation': -100},{'lightness': 65},{'visibility': 'on'}]},
            {'featureType': 'poi', 'elementType': 'all', 'stylers': [{'saturation': -100},{'lightness': '50'},{'visibility': 'simplified'}]},
            {'featureType': 'road','elementType': 'all','stylers': [{'saturation': '-100'}]},
            {'featureType': 'road.highway','elementType': 'all','stylers': [{'visibility': 'simplified'}]},
            {'featureType': 'road.arterial','elementType': 'all','stylers': [{'lightness': '30'}]},
            {'featureType': 'road.local','elementType': 'all','stylers': [{'lightness': '40'}]},
            {'featureType': 'transit','elementType': 'all','stylers': [{'saturation': -100},{'visibility': 'simplified'}]},
            {'featureType': 'water','elementType': 'geometry','stylers': [{'hue': '#ffff00'},{'lightness': -25},{'saturation': -97}]},
            {'featureType': 'water','elementType': 'labels','stylers': [{'lightness': -25},{'saturation': -100}]}]
        });
    
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();  
        var markers_array = new Array(), locations = [], array_holder, loc_content = '', loc_ctr = 0, emp_phones = '';";
    
        while ( $locLoop->have_posts() ) : $locLoop->the_post();  
            if(!empty(get_field('map_location'))): 

            $postvar .=" var loc_title = '" .get_the_title(). "';";
            //$postvar .=" var loc_id = " .get_the_ID(). ";";
            $postvar .=" var office_lat = " .get_field('map_location')['lat'].";";
            $postvar .=" var office_lng = " .get_field('map_location')['lng'].";";
            $postvar .=" loc_content = '<div class=mapinfo id=mapInfo'+loc_ctr+'>';";
            $postvar .=" loc_content += '' +loc_title+ '';";
            $postvar .=" loc_content += '</div>';";
            $postvar .=" array_holder = [loc_title, office_lat, office_lng, loc_content];
            locations.push(array_holder);
            loc_ctr = loc_ctr+1; ";
            $arrID[] = get_the_ID() ;
            endif;   
        endwhile; 
        wp_reset_postdata();
        
        $postvar .="  for (var i = 0; i < locations.length; i++) {
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: '".MBN_ASSETS_URI."/img/gmap-pointer.png',
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
     
    }</script> ";
    
    $postvar   .= '<div id="gmap"></div>'; 
    $postvar   .= '</div>';
    $postvar   .= '<ul class="location_states">';
        $location_categories = get_terms( 'locations-cat', array('orderby' => 'title', 'order' => 'ASC', 'parent' => 0, 'hide_empty' => true));
        foreach ( $location_categories as $location_category ) {
            $args = array('posts_per_page' => -1, 'tax_query' => array( 'relation' => 'AND', array( 'taxonomy' => 'locations-cat', 'field' => 'slug', 'terms' => $location_category->slug, 'include_children' => false )
                ), 'post_type' => 'location', 'orderby' => 'title,');
            $locations = new WP_Query( $args ); 
            $locCtr = 0;
            
            $postvar   .= '<li class="state_item '. $location_category->slug .'">';
            $postvar   .= '<h6 class="state_name">'. $location_category->name .'</h6>';
            $postvar   .= '<ul class="location_list">';
                while ( $locations->have_posts() ) { 
                    $locations->the_post();
                    $postvar   .= '<li class="city_item">';
                    $postvar   .= '<a href="#gmap" class="triggerMap triggerMap'.$locCtr.'" data-smooth-scroll="">'.get_the_title().'</a>';
                    
                }
                $postvar   .= '</ul>';
                $postvar   .= '</li>';
                $locCtr++; 
        }

   
    $postvar   .= '</ul>';

    return $postvar;
    }
add_shortcode('display_locations_gmap', 'find_us_gmap');






