<?php get_header(); ?>

  <div class="page-content" >
    <header class="jumbo-bg-pic" style="background-image: url('/wp-content/uploads/2020/10/IMG_0761.jpg')">

        <div class="header-logo" style="">

          <?php include 'assets/WalmacLogo-Vector.svg' ?>
        </div>
        <div class="gradienttm header-bg-gradient"></div>
    </header>

    <section class="dark-bg text-center">
    </section>

    <section class="text-area " id="about">
      <p>
      Located in the heart of Kentucky horse country, Walmac Farm is currently the home to Gary Broad’s commercial broodmare band as he continues the legacy of Walmac’s long standing tradition of raising healthy and happy champions.</p>
      <p>
      Known as Valley Farm in the 1700s, Walmac had gone through much reshaping by the time Robert Wallace McIlvain gave Walmac its current name after purchasing it in 1936. That owner had the distinction during his reign at Walmac of breeding five racehorses who earned over $100,000 – an incredible feat at the time.
      Assisted early on by Leslie Combs II before Combs moved on to focus on his own business at Spendthrift Farm, McIlvain was determined to succeed in Thoroughbred racing.
      </p>


      <p>
      With that goal in mind, his broodmare band was purchased from some of the best breeders in the world and included many prolific mares. Among those gracing the Walmac pastures were multiple stakes producer Masked Dancer, The Nut’s dam Afternoon, Bow and Arrow’s dam Beaming Over, and Bottle Green – the dam of Walmac Farm’s own Olney.
      </p>

      <p>It wasn’t until Walmac was put into the custodianship of John T.L. Jones Jr. in 1976 and renamed Walmac International, however, that it came to the worldwide prominence it has today.
      </p>

    </section>


<!--

    <section class="jumbo-bg-pic" style="background-image: url('/wp-content/uploads/2020/10/Walmac-sign.jpg')">
      <div class="big-text">
        <h1 class="text-white text-center small-h1">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

          </h1>

      </div>
        <div class="gradienttm"></div>
    </section>


    <section class=" blue-bg">
      <div class="text-area">
        <h1 >The Farm —</h1>

      <h5> h5</h5>

      <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>
          <i>italic</i></p>

          <hr>
    </section>




      <section class="jumbo-bg-pic" style="background-image: url('/wp-content/uploads/2020/10/Walmac.TG-37.jpg')">
        <div class="big-text">

           <h1 class="text-white text-center small-h1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
        </div>
          <div class="gradienttm"></div>
      </section>



      <section class="text-area">

        <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>
            <i>italic</i></p>

      </section> -->

      <section id="google-map">
          <?php
          $location = get_field('map');
          if( $location ): ?>
              <div class="acf-map" data-zoom="16">
                  <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
              </div>
          <?php endif; ?>
      </section>

      <section id="contact" class="jumbo-bg-pic" style="background-image: url('/wp-content/uploads/2020/10/Walmac.TG-14.jpg')";>
        <div class="big-text">


             <h1 class="text-white mb-5">Contact Us</h1>
             <?php echo do_shortcode( '[contact-form-7 id="8" title="Contact form 1"]' ) ?>

        </div>
          <div class="gradienttm"></div>
      </section>




      <section>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBenp3TVFzlYZVW2TRy0UorY7RDopDsSek"></script>

      <script type="text/javascript">
      (function( $ ) {

      /**
       * initMap
       *
       * Renders a Google Map onto the selected jQuery element
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   jQuery $el The jQuery element.
       * @return  object The map instance.
       */
      function initMap( $el ) {

          // Find marker elements within map.
          var $markers = $el.find('.marker');

          // Create gerenic map.
          var mapArgs = {
              zoom        : $el.data('zoom') || 16,
              mapTypeId   : google.maps.MapTypeId.ROADMAP
          };
          var map = new google.maps.Map( $el[0], mapArgs );

          // Add markers.
          map.markers = [];
          $markers.each(function(){
              initMarker( $(this), map );
          });

          // Center map based on markers.
          centerMap( map );

          // Return map instance.
          return map;
      }

      /**
       * initMarker
       *
       * Creates a marker for the given jQuery element and map.
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   jQuery $el The jQuery element.
       * @param   object The map instance.
       * @return  object The marker instance.
       */
      function initMarker( $marker, map ) {

          // Get position from marker.
          var lat = $marker.data('lat');
          var lng = $marker.data('lng');
          var latLng = {
              lat: parseFloat( lat ),
              lng: parseFloat( lng )
          };

          // Create marker instance.
          var marker = new google.maps.Marker({
              position : latLng,
              map: map
          });

          // Append to reference for later use.
          map.markers.push( marker );

          // If marker contains HTML, add it to an infoWindow.
          if( $marker.html() ){

              // Create info window.
              var infowindow = new google.maps.InfoWindow({
                  content: $marker.html()
              });

              // Show info window when marker is clicked.
              google.maps.event.addListener(marker, 'click', function() {
                  infowindow.open( map, marker );
              });
          }
      }

      /**
       * centerMap
       *
       * Centers the map showing all markers in view.
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   object The map instance.
       * @return  void
       */
      function centerMap( map ) {

          // Create map boundaries from all map markers.
          var bounds = new google.maps.LatLngBounds();
          map.markers.forEach(function( marker ){
              bounds.extend({
                  lat: marker.position.lat(),
                  lng: marker.position.lng()
              });
          });

          // Case: Single marker.
          if( map.markers.length == 1 ){
              map.setCenter( bounds.getCenter() );

          // Case: Multiple markers.
          } else{
              map.fitBounds( bounds );
          }
      }

      // Render maps on page load.
      $(document).ready(function(){
          $('.acf-map').each(function(){
              var map = initMap( $(this) );
          });
      });

      })(jQuery);
      </script>



        </section>


          <section class="dark-bg text-center">

            <p style="color: whitesmoke; padding-top: 20px;">Walmac Farm</p>

          </section>


    </div>


<?php get_footer(); ?>
