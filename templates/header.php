<?php
get_template_part('templates/head');
?>
<div class="visible-tab-pt visible-xs modal task-modal" id="task-modal">

    <div class="container">
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
<div class="search-cover"></div>
<header class="main-header utility">
  <div class="row">
    <div class="col-xl-10 col-lg-11 col-sm-10 col-12 mx-auto">

      <div class="row align-items-center">
        <div class="col-2">
            <a href="/" class="logo">
                <?php echo file_get_contents(get_stylesheet_directory() . '/dist/img/nav-logo.svg'); ?>
            </a>
        </div>
        <div class="col-10 hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-4 ml-auto">
                    <div class="lang-toggle">
                        <ul>
                        <li><?php echo do_shortcode('[glt language="English" label="English"]');?>
                            </li>
                        <li><?php echo do_shortcode('[glt language="Spanish" label="Spanish"]');?>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">

                            <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
                  </div>
              </div>
                <div class="row action-menu">
                    <div class="col-md-12 text-right">

                      <?php wp_nav_menu( array( 'theme_location' => 'action',
                                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s
                                              <li>
                                              <a href="#" class="search-toggle no-hover"><i class="fa fa-search"></i></a>
                                              </li>
                                              </ul>'
                                              ) ); ?>

                      <div class="search-container">
                        <?php echo get_search_form();?>


                      </div>

                  </div>
              </div>


            </div>
        <div class="col-10 visible-sm visible-xs">
          <div class="row">

          <div class="col-md-11 col-6 ml-auto">
              <div class="lang-toggle">
                  <ul>
                  <li><?php echo do_shortcode('[glt language="English" label="English"]');?>
                      </li>
                  <li><?php echo do_shortcode('[glt language="Spanish" label="Spanish"]');?>
                      </li>
                  </ul>


              </div>
          </div>

          <div class="col-md-1 col-3"> <a class="menu-toggle" href="#" title=""><span></span><span></span><span></span></a></div>


          </div>


        </div>
        </div>
    </div>

  </div>
</header>

<div class="contact-form modal visible-xs" id="contact-modal">
    <div class="container container-fluid">


        <div class="row">
        <div class="col-md-12">


                    <h2><span>Contact onePULSE Foundation</span>Contact Us</h2>
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
                <p class="mt0 mb16">1912 South Orange Avenue<br>Orlando, FL 32806</p>
                <p class="mt0 mb0"><span>office</span> <a href="tel":><?php the_field('contact_office','options');?></a></p>
                <p class="mt0 mb8"><a class="" href="mailto:info@onePULSEFoundation.org"><b>email</b> info@onePULSEfoundation.org</a></p>
                <p class="mt0 mb16"><a href="tel:407-775-2437"><span>office</span> 407-775-2437</a></p>
                <h4 class="mb8">Event, Outreach and Volunteer Coordination</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:np@onepulsefoundation.org">np@onepulsefoundation.org</a></p>
                <p class="mt0 mb8"><span>mobile</span> <a href="tel:407.775.2437">407.775.2437</a></p>

                <h4 class="mb8">Accounting and Billing Inquiries</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:office@onepulsefoundation.org">office@onepulsefoundation.org</a></p>
                <p class="mt0 mb8"><span>mobile</span> <a href="tel:407.775.2436">407.775.2436</a></p>

                <h4 class="mb8">Fundraising Inquiries</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:ls@onepulsefoundation.org">ls@onepulsefoundation.org</a></p>

                <h4 class="mb8">Media Requests</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:media@onepulsefoundation.org">media@onepulsefoundation.org</a></p>


                <h4 class="mb8">Employment or General Inquiries</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:info@onepulsefoundation.org">info@onepulsefoundation.org</a></p>

                <h4 class="mb8">CEO/Executive Director</h4>
                <p class="mt0 mb0"><span>email</span> <a href="mailto:bp@onepulsefoundation.org">bp@onepulsefoundation.org</a></p>
                </div>





            </div>
        </div>
    </div>

</div>

<div class="full-menu">
    <div class="container">
        <div class="col-12 mx-auto">
            <?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
        </div>
    </div>
</div>
