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
		<div class="member-body mb64 mb-xs-0">
			<section class="post-image">
				<div class="row">
					<div class="col-lg-5 col-md-4 <?php the_field('overlay_color');?>" >
						<?php $banner = get_field('banner'); echo '<img id="featured-image" src="'. $banner['sizes']['large'] .'" alt="';
						
							if (!$banner['alt'] == null): 
							echo $banner['alt']; else: 
							echo get_the_title() . ' - ' . get_bloginfo(); 
							endif;
							echo '">';
							?>
						<?php echo '<label class="img-attrib">' . $banner['caption'] . '</label>';?>
							<?php 
						if(get_field('headshot')): $headshot = get_field('headshot'); 
						echo '<img class="over-image headshot" src="'. $headshot['sizes']['large'] .'" alt="'; 
						if (!$headshot['alt'] == null): 
						echo $headshot['alt']; 
						else: 
						echo get_the_title() . ' - ' . get_bloginfo(); 
						endif; 
						echo '">'; 
						endif;?>
					</div>
					<div class="<?php if(get_field('headshot')): echo 'col-lg-4 col-lg-offset-2 col-md-5 col-md-offset-2'; else: echo 'col-md-4 col-md-offset-1'; endif;?> mt64 mb120">
						<h1><span class="<?php the_field('overlay_color');?> clip small"><?php the_field('title');?></span><?php echo get_the_title();?></h1>

						<?php the_field('bio');?>

					</div>
				</div>

			</section>

			<?php get_template_part( 'partials/section', 'task-force' );?>




		</div>

		<?php get_template_part('templates/footer'); ?>
