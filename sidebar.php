<div class="two columns primary sidebar">

   <? if(is_page()) : 
   
   if(!$post->post_parent) :
      $title = get_the_title($post->ID);
      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
   else :
      if($post->ancestors) :
         $ancestors = end($post->ancestors);
         $title = '<a href="'.get_permalink($ancestors).'">'.get_the_title($ancestors).'</a>';
         $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
      endif;
   endif;
   
   if ($children) : ?>
      <nav class="sub-navigation">
         
         <h3 class="sub-title"><? echo $title; ?></h3>

      <ul>
         
         <? echo $children; ?>
         
      </ul>
      
      </nav>
      
   <? endif; ?>

<? endif; ?>

   <section class="recent-posts">
      
      <h2>Recent posts</h2>
      
      <? $args = array(
         'post_type' => 'post',
         'posts_per_page' => 10
         );
      
       $recentPosts = new WP_Query($args);
   
       if($recentPosts->have_posts()) : ?>
       
       <ul>
       
         <? while($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
      
         <li>
            <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?>
               <time datetime="<?php the_time( 'Y-m-d' ); ?>"><? the_date(); ?></time>
               <span class="more">More</span>
            </a>
         </li>
         
         <? endwhile; wp_reset_postdata(); ?>
            
      </ul>
      
      <? endif; ?>
      
   </section><!-- recent-post -->

   <section class="team">

         <h2>The Team</h2>

   <? $args = array(
         'post_type' => 'member'
      );
      
      $members = new WP_Query($args);
      
      if($members->have_posts()) : ?>   
      
      <? while($members->have_posts()) : $members->the_post(); ?>
            
         <? if(has_post_thumbnail()) : ?>
         
            <?
            $img_id = get_post_thumbnail_id($post->ID); 
            $image = wp_get_attachment_image_src($img_id, 'primary');
            $img_url = $image['0'];
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            ?>
            
            <figure>
               <a href="<? the_permalink(); ?>"><img src="<? echo $img_url; ?>" title="<? the_title_attribute(); ?> thumbnail image" alt="<? $alt_text; ?>" /></a>
            </figure>
            
         <? endif; ?>
         
      <? endwhile; wp_reset_postdata(); ?>
            
   <? endif; ?>
   
   </section><!-- team -->

</div>

<div class="three columns secondary sidebar">
   
       <? $args = array(
         'post_type' => 'training'
      );
      
      $training = new WP_Query($args);
      
      if($training->have_posts()) :
   ?>
   
   <section <? post_class(); ?>>
   
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
            
            <p class="date"><? echo $fromDate->format('dS F') .' - '. $toDate->format('dS F'); ?></p>
            
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
      </ul>
   
   </section><!-- connect -->
   
   <? endif; ?>
   
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

   
   <section class="photo-stream">   
   
      <h2>Latest Photos</h2>
   
   </section><!-- photo-stream -->
   
</div>