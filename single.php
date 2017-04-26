<?php
/**
 * The Template for displaying all single posts
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
	<?php get_template_part('templates/header'); ?>

<div class="main-wrapper">
		<div class="post-body">
			<section class="post-image">
				<div class="row">
					<div class="col-lg-8">
				<?php 
						
				$video = get_field('post_video');
				$poster = get_field('video_poster');
				$size = 'medium';
				$source = get_field('video_source');
				$ext_source = get_field('source');
				$url = get_field('url');
						
				if(!$video == null):?>

						<img id="featured-image" class="hidden-xs" src="<?php echo $poster['sizes'][ $size ];?>">
						<?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
						
						<?php if($source == 'File'): ?>
						
						<div class="over-video">
							<label>
								<span>Video</span>
								<?php the_field('video_title');?>
							</label>
							<video id="video" class="video-js vjs-sublime-skin" playsinline controls poster="<?php echo $poster['sizes']['large'];?>" preload="none" width="100%" height="800" data-setup="{}">
								<source src="<?php echo $video;?>" type="video/mp4">
							</video>
							<?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
						</div>
						<?php endif;?>
						
						<?php if($ext_source == 'youtube'): ?>
						<div class="over-video">
						<label>
							<span>Video</span>
							<?php the_field('video_title');?>
						</label>	
							<video id='video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo $poster['sizes']['large'];?>" preload='none' width='100%' height='800' data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $url;?>" }]}'></video>
							<?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
						</div>
						<?php endif;?>
						<?php if($ext_source == 'vimeo'): ?>
							<div class="over-video">
						<label>
							<span>Video</span>
							<?php the_field('video_title');?>
						</label>
							<video id='video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo $poster['sizes']['large'];?>" preload='none' width='100%' height='800' data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "<?php echo $url;?>" }], "vimeo": { "ytControls": 2 }}'></video>						
							<?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
						
						</div>
						<?php endif;?>						
						
			<?php else: ?>			
						<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' ); $url = $thumb['0']; ?>
							<?php if( has_post_thumbnail()): echo '<img id="featured-image" class="hidden-xs" src="'. $url .'" crossorigin="anonymous">'; endif;?>
						<?php if( has_post_thumbnail()): echo '<img class="over-image" src="'. $url .'">'; endif;?>
						
			<?php endif;?>

					</div>

				</div>

			</section>

			<section class="pt120 pb120 pt-xs-0 pb-xs-0">
				<div class="container">


					<div class="row">

						<?php $video = get_field('post_video');
		$poster = get_field('video_poster');
		$size = 'medium';
						
			if(!$video == null):?>

							<div class="col-md-8">
								<h1><span><?php echo get_the_date();?></span><?php echo get_the_title();?></h1>
								<h4 class="text-left mb8">Share this</h4>
								<ul class="socials shares">
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/home?status=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								</ul>

								<?php the_content();?>
								
								<?php $pr = get_field('include_pr_snippet'); if(!$pr == null):?>
								<h3>About onePULSE Foundation</h3>
								<?php the_field('about_info');?>
								<?php endif;?>

							</div>



							<div class="col-md-4">
								<label data-stellar-ratio="1"><span>Video</span>
									<?php the_field('video_title');?>
										<div class="line"></div>
								</label>

								<div>

							<?php if($source == 'File'): ?>
									<a href="<?php echo $video; ?>" class="btn mt16" download>Download Video </a>
									
									<?php else:?>
									
									<?php if($ext_source == 'youtube'): ?>
									<a href="<?php echo $url;?>" class="btn mt16 pop-link">View on YouTube </a>
									<?php endif;?>
									<?php if($ext_source == 'vimeo'): ?>
									<a href="<?php echo $url;?>" class="btn mt16 pop-link">View on Vimeo </a>
									<?php endif;?>
									<?php endif;?>
									
									
								</div>

							</div>

							<?php else: ?>
								<div class="col-md-10">
									<h1><span><?php the_date();?></span><?php echo get_the_title();?></h1>


									<?php the_content();?>

								</div>
								<?php endif;?>
					</div>
				</div>

			</section>




		</div>

		<?php get_template_part('templates/footer'); ?>
