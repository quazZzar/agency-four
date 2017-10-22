<?php 
/**
 * Template Name: Service Page
 *
 * @package WordPress
 * @subpackage Agency Themes
 * @
 */ 
get_header(); ?>
	<div class="grid-section">
		<div class="row">
			<?php if(_go('global_btn_colors')) : ?>
				<style type="text/css">
					.grid-cover a .text p .learnMoreButton:hover {
						background-color: <?php _eo('global_btn_colors'); ?>;
						border: 2px solid <?php  _eo('global_btn_colors'); ?>;
					}
				</style>
			<?php endif; 

			$services_args = array(
					'post_type' => 'services',
					'post_status' => 'publish',
					'posts_per_page' => cs_get_option('services_number') ? cs_get_option('services_number') : 9
				);
				$services_query = new WP_Query($services_args);

				if($services_query->have_posts()) :
					while($services_query->have_posts()) : $services_query->the_post();  ?>
						<div class="grid-cover col-md-4">
							<a href="<?php the_permalink(); ?>">
								<span class="text">
									<h3><?php the_title(); ?></h3>
									<p>
										<?php echo get_the_excerpt(); ?>
										<br><br>
										<span class="learnMoreButton">Learn More</span>
									</p>
								</span>
							</a>
							<span class="cover" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'services-home' ) : get_template_directory_uri().'/img/box-1.2.jpg'; ?>);"></span>
						</div>
				<?php endwhile;
			endif; ?>
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