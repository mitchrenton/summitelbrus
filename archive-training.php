<? get_header(); ?>

</header>

   <div class="row">
         
      <h1 class="sub-title">Training</h1>
         
      <? if(have_posts()) : while(have_posts()) : the_post(); ?>
      
         <div <? post_class('four columns'); ?>>
         
            <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
         
               <h2><? the_title(); ?></h2>
               
               <? $location = get_field('training_location'); ?>
               
               <? if($location) : ?>
                        
                  <span class="reveal"><p class="meta"><span>Location:</span> <? echo $location['address']; ?></p></span>
                  
                  <img src="http://maps.google.com/maps/api/staticmap?center=<? echo $location['coordinates']; ?>&zoom=8&size=518x518&sensor=false" />
               
               <? endif; ?>
               
               <? the_excerpt(); ?>
            
            </a>
         
         </div>
      
      <? endwhile; endif; ?>
      
   
   </div>
   
<? get_footer(); ?>