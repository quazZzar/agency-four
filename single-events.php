<?php get_header(); 
	if(have_posts()) :
		while(have_posts()) : the_post();  
			$event_meta = get_post_meta(get_the_ID(), '_events_options', true); ?>
			<div id="subPageCover">
				<div class="container">
					<div class="row">
						<div class="col-md-<?php echo is_active_sidebar( 'event-sidebar' ) ? '8' : '12'; ?>">
							<section class="event_body">
								<div class="row">
									<?php if(has_post_thumbnail()) : ?>
										<div class="col-md-3">
											<div class="event_thumbnail">
												<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'original' ); ?>">
											</div>
										</div>
									<?php endif; ?>
									<div class="col-md-<?php echo has_post_thumbnail() ? '9' : '12'; ?>">
										<div class="evet_sumarry">
											<div class="event_date">
												<?php echo @$event_meta['event_datetime']; ?>
											</div>
											<div class="event_content">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="event_location">
									<?php echo $event_meta['event_location']; ?>
								</div>		
								<div id="map-canvas" class="map">
									<script type="text/javascript">
										<?php if(@$event_meta['latitude'] && @$event_meta['longitude']) :
											$map_latitude = @$event_meta['latitude'];
											$map_longitude = @$event_meta['longitude'];
										else :
											$map_latitude = '40.698227';
											$map_longitude = '-73.440523';
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
								</div>	
							</section>
						</div>
						<?php if (is_active_sidebar( 'event-sidebar' )): ?>
							<div class="col-md-4">
								<div class="subPageRight event_has_sidebar">
									<?php dynamic_sidebar('event-sidebar'); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile;
	endif; ?>
<?php get_footer();