<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<?php if(is_home() || is_front_page() || is_archive()) : ?>
				<div class="video">
					<div class="embed-responsive embed-responsive-16by9">
						<video "controls":="" true="" muted="" autoplay="" id="example_video_1" class="embed-responsive-item" preload="auto" loop="" data-setup="{&quot;example_option&quot;:true}">
							
								<?php if(_go('section1_background_video')): 
								echo '<source src="'; _eo('section1_background_video'); echo '" type="video/mp4">';
								else: ?>
									<source src="https://player.vimeo.com/external/234415682.sd.mp4?s=aacef44b6970025ab91a70fd779eb4ea567241a7&profile_id=165" type="video/mp4">
								<?php endif ?>
							
						</video>
					</div>
				</div> 
			<?php endif; ?>
			<?php if(is_singular() && !is_singular( 'events' ) && !is_singular( 'staff' ) && !is_singular( 'services' )) : ?>
				<div id="subPageTop" style="background-image:url(<?php echo has_post_thumbnail(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID(), 'original') : get_template_directory_uri().'/img/sub-10.jpg';  ?>);">
					<div class="content">
						<div class="subTopTextWrap">
							<div class="subTopText">
								<h1><?php the_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
				<?php $single_page_meta = get_post_meta(get_the_ID(), '_page_subtitles', true); 
				if($single_page_meta && @$single_page_meta['section_1_page_subtitle'] && @$single_page_meta['section_1_page_subtitle'] !== '') : ?>
					<div id="subHeadText">
						<div class="content">
							<div class="subTopTextWrap2">
								<div class="subTopText2">
									<h2><?php echo $single_page_meta['section_1_page_subtitle']; ?></h2>
								</div>
							</div>
						</div>
					</div>
				<?php endif;
			endif; ?>
			<?php if(is_singular('events')) : 
				$event_meta = get_post_meta(get_the_ID(), '_events_options', true);?>
				<div id="subPageTop" style="background-image:url(<?php echo @$event_meta['event_image'] ? @$event_meta['event_image'] : get_template_directory_uri().'/img/sub-10.jpg';  ?>);">
					<div class="content">
						<div class="subTopTextWrap">
							<div class="subTopText">
								<h1><?php the_title(); ?></h1>
								<span class="event_venue">
									<?php echo @$event_meta['event_venue']; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(is_singular('staff')) : ?>
				<div id="subPageTop" style="background-image:url(<?php echo get_template_directory_uri().'/img/sub-10.jpg';  ?>);">
					<div class="content">
						<div class="subTopTextWrap">
							<div class="subTopText">
								<h1>Team Member</h1>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(is_singular('services')) : 
				$services_meta = get_post_meta(get_the_ID(), '_services_options', true);?>
				<div id="subPageTop" style="background-image:url(<?php echo @$services_meta['service_image'] ? @$services_meta['service_image'] : get_template_directory_uri().'/img/sub-10.jpg';  ?>);">
					<div class="content">
						<div class="subTopTextWrap">
							<div class="subTopText">
								<h1><?php the_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="header" <?php echo is_singular() ? 'style="background-color: transparent;"' : ''; ?>>
				<div class="container">
					<div class="menu-trigger">
						<span class="menu-bar"></span>
						<span class="menu-bar"></span>
						<span class="menu-bar"></span>
					</div>
					<div class="row">
						<div class="col-md-3">
								<div id="logo">
									<a href="<?php echo home_url('/'); ?>">
										<img id="logo-id" src="<?php if(cs_get_option('site_logo')) : echo cs_get_option('site_logo'); else : echo get_template_directory_uri().'/img/logo.jpg'; endif;  ?>">
									</a>
								</div>
						</div>
						<div class="col-md-9">
							<div id="nav">
								<ul id="menu">
									<?php wp_nav_menu( 
										array(
											'title_li' => '',
											'theme_location' => 'main_menu',
											'container' => false,
											'items_wrap' => '%3$s',
											'fallback_cb' => 'wp_list_pages'
										)
									); ?>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<?php if(is_home() || is_front_page()) : ?>
						<div class="row text-center hero-video-text">
							<div class="col-md-12">
								<h1 <?php echo _go('section1_text_color') ? 'style="color: '. _go('section1_text_color').' !important;"' : '';  ?>>
									<?php if(_go('section1_big_text')): 
										 _eo('section1_big_text');
									else: ?>
										Retirement income needs<br> to be dependable.
									<?php endif; ?>
								</h1>   
								<h2 <?php echo _go('section1_text_color') ? 'style="color: '. _go('section1_text_color').' !important;"' : '';  ?>>
									<?php if(_go('section1_small_text')): 
										 _eo('section1_small_text');
									else: ?>
										We are here to help empower you financially.
									<?php endif; ?>
								</h2>
								 <div class="watch-button" <?php if(_go('global_btn_colors'))  echo 'style="background: '. _go('global_btn_colors').';"';
								 	elseif(_go('section1_button_color')) echo 'style="background: '. _go('section1_button_color').';"';?>>
									<a  href="<?php echo _go('section1_button_link') ? _go('section1_button_link') : '/our-story/'  ?>">
										<?php if(_go('section1_button_text')): 
											 _eo('section1_button_text');
										else: ?>
											<img src="<?php echo get_template_directory_uri().'/img/play.png'; ?>">
											<span>Watch Our Story</span>
										<?php endif; ?>
									</a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>