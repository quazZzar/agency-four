<?php 
/**
 * Template Name: Service Page
 *
 * @package WordPress
 * @subpackage Agency Themes
 * @
 */ 
get_header(); ?>
	<div id="subPageCover" <?php post_class('services-page-template'); ?>>
		<div class="container">
			<div class="row">
				<?php $services_args = array(
					'post_type' => 'services',
					'post_status' => 'publish',
					'posts_per_page' => cs_get_option('services_number') ? cs_get_option('services_number') : 9
				);
				$services_query = new WP_Query($services_args);

				if($services_query->have_posts()) :
					$i = 1; 
					while($services_query->have_posts()) : $services_query->the_post(); 
						if($services_query->post_count < 9 && $i >= 7 || $services_query->post_count < 6 && $i >= 4 ) break; ?>
						<div class="col-sm-4">
							<a href="<?php the_permalink(); ?>" class="caption_link">
								<div class="service_item_archive">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'single-service'); ?>" alt="service">
									<div class="service_caption_title" style="<?php if(cs_get_option('services_title_color')) echo 'color: '.cs_get_option('services_title_color').'; '; if(cs_get_option('services_background_color')) echo 'background-color: '.cs_get_option('services_background_color').'; opacity: initial;';  ?>"><?php the_title(); ?></div>	
								</div>
							</a>
						</div>
					<?php $i++; endwhile; 
				endif; ?>
			</div>
		</div>
	</div>
	
	<section id="map-canvas" class="map">
		<script type="text/javascript">
			<?php if(_go('map_latitude') && _go('map_longitude')) :
				$map_latitude = _go('map_latitude');
				$map_longitude = _go('map_longitude');
			else :
				$map_latitude = '41.698227';
				$map_longitude = '-72.440523';
			 endif; ?>
			// Describe Google Maps Init Function 
			function initialize_contact_map (customOptions) {
				var mapOptions = {
					zoom: 17,
					scrollwheel: false,
					disableDefaultUI: false,
					center: new google.maps.LatLng( <?php echo $map_latitude ?>, <?php echo $map_longitude ?>),
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					styles: [
						{
							stylers: [
									{
										saturation: -100
									}
							]
						}
					]
				};
				var contact_map = new google.maps.Map( jQuery( '#map-canvas' )[0], mapOptions ),
					marker = new google.maps.Marker({
					map: contact_map,
					position: new google.maps.LatLng( <?php echo $map_latitude ?>, <?php echo $map_longitude ?> ),
					icon: "<?php echo get_template_directory_uri().'/img/marker.png' ?>",
				});
			}

			if( jQuery( '#map-canvas' ).length ) {
				google.maps.event.addDomListener( window, 'load', initialize_contact_map() );
			}
		</script>
	</section>	
<?php get_footer(); ?>