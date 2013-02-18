<? get_header(); ?>

</header>

   <div class="row">
         
      <h1 class="sub-title">Team members</h1>
         
      <? if(have_posts()) : while(have_posts()) : the_post(); ?>
      
         <div <? post_class('three columns'); ?>>
         
            <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
         
               <h2><? the_title(); ?></h2>
               
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
                  
                  <? if(get_field('nickname')) : ?>
                  
                     <p class="nickname">AKA: <? the_field('nickname'); ?></p>
                  
                  <? endif; ?>
                                          
               <? endif; ?>
               
               <? the_excerpt(); ?>
            
            </a>
         
         </div>
      
      <? endwhile; endif; ?>
      
   
   </div>
   
<? get_footer(); ?>