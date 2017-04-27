<?php ;?>		
		


<section class="contact-form pb120 hidden-xs">
	<div class="container container-fluid">


		<div class="row">
		<div class="col-md-12">
		
				<?php if (!$count): ?>
					<h1><span>Contact onePULSE Foundation</span>Contact Us</h1><?php else:?>
					<h2><span>Contact onePULSE Foundation</span>Contact Us</h2><?php endif;?>
			</div>
		
		
		</div>
		<div class="row">
			<div class="col-md-8">

					<?php echo do_shortcode('[contact-form-7 id="4" title="Contact Form"]');?>

			</div>
			<div class="col-md-4">
				
				<div class="line mt-xs-32 mb-xs-32"></div>

				<div class="contact-info">
				<h3>onePULSE Foundation</h3>
				<!--<p class="mt0 mb16">1912 South Orange Avenue<br>Orlando, FL 32806</p>-->
				<p class="mt0 mb0"><span>office</span> <a href="tel":><?php the_field('contact_office','options');?></a></p>	
				<p class="mt0 mb16"><span>email</span> <a href="mailto:info@onePULSEFoundation.org">info@onePULSEFoundation.org</a></p>
				<p class="mt0 mb8">For all media inquires please contact:</p>
				<h4 class="mb8">Sara Brady</h4>
					
				<p class="mt0 mb0"><span>office</span> <a href="tel:407-702-6632">407-702-6632</a></p>	
				<p class="mt0 mb8"><span>mobile</span> <a href="tel">407-408-4000</a></p>	
				<p class="mt0 mb0">Any remaining inquires, pleas​e contact:</p>
				<a class="mt0 mb0" href="mailto:info@onePULSEFoundation.org">info@onePULSEFoundation.org</a>
				</div>


				


			</div>
		</div>
	</div>

</section>