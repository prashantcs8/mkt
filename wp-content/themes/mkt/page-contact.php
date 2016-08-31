<?php
/*
 * Template Name: Contact Page
 */
get_header();
$page_meta = get_post_meta($post->ID);
//pr($page_meta);
?>
<?php if (have_posts()) : the_post(); ?>
<div class="col-md-12">
    <div class="section-top">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<?php endif; ?>
<div class="clearfix"></div>
<section id="content" style="margin-bottom: 0px;">
    <div class="content-wrap nopadding">
        <div id="section-contact" class="page-section notoppadding">
            <div class="row noleftmargin norightmargin bottommargin-lg common-height">
                <div class="col-md-8 col-sm-6" style="padding:0px;"> 
                   <div id="googlemaps" class="google-map"></div>
                </div>
                <div class="col-md-4 col-sm-6 contact_info" >
                    <div class="col-padding max-height">
                        <?php 
                        $heading_contact_info = $page_meta['heading_contact_info'][0];
                        $address_1_contact_info = $page_meta['address_1_contact_info'][0];
                        $address_2_contact_info = $page_meta['address_2_contact_info'][0];
                        $phone_no_contact_info = $page_meta['phone_number_contact_info'][0];
                        $fax_contact_info = $page_meta['fax_contact_info'][0];
                        $email_addr_contact_info = $page_meta['email_address_contact_info'][0];
                        ?>
                        <?php if($heading_contact_info !=''){ ?>
                        <h3 class="font-body t400 ls1"><?php echo $heading_contact_info; ?></h3>
                        <?php } ?>
                        <div style="font-size: 16px; line-height: 1.7;">
           <?php if($address_1_contact_info !=''){  echo '<address>'.$address_1_contact_info.'</address>';  } ?>
                            <div class="clear topmargin-sm"></div>
           <?php if($address_2_contact_info !=''){  echo '<address>'.$address_2_contact_info.'</address>';  } ?>
                            <div class="clear topmargin"></div>
                            <?php if($phone_no_contact_info !=''){ ?>
                 <abbr title="Phone Number"><strong>Phone:</strong></abbr><?php echo $phone_no_contact_info; ?><br>
                            <?php } ?>
                 <?php if($fax_contact_info !=''){ ?>
                            <abbr title="Fax"><strong>Fax:</strong></abbr><?php echo $fax_contact_info; ?><br>
                            <?php } ?>
                            <?php if($email_addr_contact_info !=''){ ?>
                 <abbr title="Email Address"><strong>Email:</strong></abbr><?php echo $email_addr_contact_info; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container clearfix">
                <div class="divcenter topmargin" style="max-width: 850px;">                    
                    <?php 
                    $form_shortcode = $page_meta['contact_form_shortcode'][0];
//      $form_shortcode = '[contact-form-7 id="4" title="Contact form" html_id="template-contactform"]';
                   if($form_shortcode !=''){   echo do_shortcode($form_shortcode); }                   
                    ?>                     
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<?php 
$map_address = 'map_address';
$heading_1_on_map_marker = $page_meta['heading_1_on_map_marker'][0];
$heading_2_on_map_marker = $page_meta['heading_2_on_map_marker'][0];
$latitude = $page_meta['latitude'][0];
$longitude = $page_meta['longitude'][0];
?>
		<script type="text/javascript">
    jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDzxpHtzOZgrxfCEaTiOw6Xf11jYoX_C3k&callback=initialize";
    document.body.appendChild(script);
});
function initialize() {
    var map;
    // Set the latitude & longitude for our location (London Eye)
    var myLatlng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
    var mapOptions = {
        center: myLatlng, // Set our point as the centre location
        zoom: 16, // Set the zoom level
        mapTypeId: 'roadmap', // set the default map type
        scrollwheel: false,
        styles: [
            {
              featureType: 'all',
              stylers: [
                { saturation: -60 }
              ]
            },{
              featureType: 'road.arterial',
              elementType: 'geometry',
              stylers: [
                { hue: '#1ABC9C' },
                { saturation: 50 }
              ]
            },{
              featureType: 'poi.business',
              elementType: 'labels',
              stylers: [
                { visibility: 'off' }
              ]
            }
          ]
    };            
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("googlemaps"), mapOptions);
    // Allow our satellite view have a tilted display (This only works for certain locations) 
    map.setTilt(45);
    // Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<h3><?php echo $heading_1_on_map_marker; ?></h3>' +
        '<p><?php echo $heading_2_on_map_marker; ?></p>' +
    '</div>';
    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });                
    // Add a marker to the map based on our coordinates
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon : '<?php bloginfo('template_directory'); ?>/images/pin.png',
        animation: google.maps.Animation.DROP,
        title: '<?php echo $heading_1_on_map_marker; ?>'
    });
    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
   infoWindow.open(map, marker);
 }
    </script>
   