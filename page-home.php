<? get_header(); ?>

<div class="hero">

   <div class="image" style="background-image: url(<? bloginfo('template_url'); ?>/images/masthead-image.jpg);">

   <!--<img src="<? bloginfo('template_url'); ?>/images/masthead-image.jpg" alt="Masthead background image" />-->
   
      <div class="logo">

         <figure>
            <img src="<? bloginfo('template_url'); ?>/images/logo.png" alt="<? echo get_bloginfo('name') .' - '. get_bloginfo('description'); ?>" />
         </figure>
               
      </div><!-- logo -->
   
   </div>

</div><!-- hero -->

<div class="content group">

   <section class="members row">
   
   <? $args = array(
         'post_type' => 'member'
      );
      
      $members = new WP_Query($args);
      
      if($members->have_posts()) : ?>   
      
      <? while($members->have_posts()) : $members->the_post(); ?>
   
         <div <? post_class('three columns'); ?>>
         
         <? if(has_post_thumbnail()) : ?>
         
            <?
            $img_id = get_post_thumbnail_id($post->ID); 
            $image = wp_get_attachment_image_src($img_id, 'primary');
            $img_url = $image['0'];
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            ?>
            
            <figure>
               <img src="<? echo $img_url; ?>" title="<? the_title_attribute(); ?> thumbnail image" alt="<? $alt_text; ?>" />
            </figure>
            
         <? endif; ?>
            
            <p><a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_field('nickname'); ?></a></p>
         
            <? the_excerpt(); ?>
                           
         </div><!-- five-column -->
         
      <? endwhile; wp_reset_postdata(); ?>
            
   <? endif; ?>
   
   </section><!-- members -->
   
   <div class="row">
   
   <? $args = array(
         'posts_per_page' => 1,
      	'post__in'  => get_option( 'sticky_posts' ),
      	'ignore_sticky_posts' => 1
      );
      
      $stickyPost = new WP_Query($args);
      
      if($stickyPost->have_posts()) :
   ?>
   
      <div <? post_class('six columns push-three sticky'); ?>>
         
         <h2 class="sub-title">Latest blog post</h2>
         
      <? while($stickyPost->have_posts()) : $stickyPost->the_post(); ?>
      
         <? if(has_post_thumbnail()) : ?>
            
            <?
            $img_id = get_post_thumbnail_id($post->ID); 
            $image = wp_get_attachment_image_src($img_id, 'primary');
            $img_url = $image['0'];
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            ?>
            
            <figure>
               <img src="<? echo $img_url; ?>" title="<? the_title_attribute(); ?> thumbnail image" alt="<? $alt_text; ?>" />
            </figure>
                  
         <? endif; ?>
         
         <h3><a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h3>
         
         <? the_excerpt(); ?>
         
         <a class="more" href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">Read more</a>
         
      <? endwhile; wp_reset_postdata(); ?>
      
      </div><!-- six columns -->
      
   <? endif; ?>
   
   <? $args = array(
         'post_type' => 'training'
      );
      
      $training = new WP_Query($args);
      
      if($training->have_posts()) :
   ?>
   
      <div <? post_class('three columns sidebar pull-six'); ?>>
      
         <section class="training">
      
            <h2>Training</h2>
            
            <? while($training->have_posts()) : $training->the_post(); ?>
            
            <div class="training-item">
            
               <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
            
                  <h3><? the_title(); ?></h3>
                  
                  <?
                  
                  $location = get_field('training_location');
                  
                  if($location) : ?>
      
                  <p class="location"><? echo $location['address']; ?></p>
                  
                  <? endif; ?>
                  
                  <? 
                  $fromDate = DateTime::createFromFormat('Ymd', get_field('from_date'));
                  $toDate = DateTime::createFromFormat('Ymd', get_field('to_date'));
                  ?>
                  
                  <? if($fromDate && $toDate) : ?>
                  
                  <date><? echo $fromDate->format('dS F') .' - '. $toDate->format('dS F'); ?></date>
                  
                  <? endif; ?>
                                 
               </a>
            
            </div><!-- trianing-item -->
         
         <? endwhile; wp_reset_postdata(); ?>
         
         </section><!-- training -->
         
         <section class="connect">
   
            <h2>Connect with us</h2>
         
            <ul>
               <li class="icon-rss"><a href="#">RSS feed</a></li>
               <li class="icon-flickr"><a href="#">Flickr</a></li>
               <li class="icon-youtube"><a href="#">YouTube</a></li>
               <li class="icon-facebook"><a href="#">Facebook</a></li>
               <li class="icon-twitter"><a href="#">Twitter</a></li>
            <ul>
         
         </section><!-- connect -->
      
      </div>
      
      <? endif; ?>
      
      <div class="three columns fitvid">
            
         <? $args = array(
               'post_type' => 'post'
            );
            
            $video = new WP_Query($args);
            
            if($video->have_posts()) :
         ?>
         
         <section <? post_class('format-video'); ?>>
            
            <h2>Latest Video</h2>
         
            <? while($video->have_posts()) : $video->the_post(); ?>
            
               <? if(has_post_format('video')) : ?>
               
                  <? the_content(); ?>
               
               <? endif; ?>
               
            <? endwhile; wp_reset_postdata(); ?>
         
         </section><!-- video -->
         
         <? endif; ?>
         
         <section class="photos">
         
            <h2>Latest Photos</h2>
         
         </section><!-- photos -->
      
      </div>
   
   </div><!-- row -->

</div><!-- content -->
   

<? get_footer(); ?>