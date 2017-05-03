<?php ;?>		
		


<section class="task-force pb120 pb-xs-32 pb-xs-32">
	<div class="container">


		<div class="row">
		<div class="col-md-6">
		<h2><span>onePULSE Foundation Memorial</span>Advisory Council</h2>
	
			</div>
		
		
		</div>
		<div class="row">
			<div class="col-md-2 hidden-xs">
				
				
		<?php $images = get_field('task_force_images', 'options');  foreach( $images as $image ): ?>
		
				<div data-stellar-ratio="1.5">
		<img class="img-parallax" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
		<?php echo '<label class="img-attrib">' . $image['caption'] . '</label>';?></div>
  <?php endforeach; ?>
				

			</div>
			<div class="col-md-6">
				
				<div class="line"></div>


				<p>The Task Force is an appointed volunteer coalition of family members of victims, survivors, and local community leaders.  This committee will give recommendations and guidance to the Board of Trustees to create, build, and financially maintain a permanent national memorial at the Pulse site.  The Task Force serves as the advisory committee who will formulate the process of building what will become an iconic tribute to the 49 souls taken from us on that horrible night, as well as to the survivors, brave first responders, surgeons, and medical providers who served so selflessly.</p>

				<p>Still in formation, the Task Force will break into different subcommittees who will each play a role in the gathering of data that will reflect the wishes of the victims’ families, the survivors, and the community at large.</p>
				
				<h4 class="text-right hidden-sm hidden-xs mt64">Select a Advisory Board Member to Read Full Bio <i class="fa fa-chevron-right"></i></h4>

				


			</div>
			<div class="col-md-4 text-right hidden-tab-pt hidden-xs">
				<div data-stellar-ratio="2" data-stellar-offset-parent="true" data-stellar-vertical-offset="300">
					
            <?php $args = array(

                'posts_per_page' => -1,
                'order'   => 'ASC',
                'post_type' => 'task-member',
            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); $category = get_the_category(); ?>
					
					<a href="<?php the_permalink();?>" class="task-link <?php the_field('overlay_color');?>"><span><?php the_field('title');?></span><?php echo get_the_title();?></a>
					
            <?php endwhile; wp_reset_postdata();?>

				</div>
			
			</div>
			
			<div class="col-sm-8 col-sm-offset-2 visible-tab-pt visible-xs">
			<a href="#task-modal" class="btn modal-toggle">Meet the Advisory Board</a>
			</div>
		</div>
	</div>

</section>