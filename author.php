<? get_header(); ?>

   </header>
   
   <div class="row">
   
      <div class="content seven columns">
      
         <? if(have_posts()) : the_post(); ?>
         
         <h1 class="sub-title">Author Archives: <?php echo get_the_author() ; ?></h1>
         
         <? rewind_posts(); while(have_posts()) : the_post(); ?>
            
            <article <? post_class(); ?> id="page-<? the_ID(); ?>">
         
               <h2><a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
               
               <p class="meta">Written by <? the_author_posts_link(); ?> ~ <time datetime="<?php the_time( 'Y-m-d' ); ?>"><? the_date(); ?> <? the_time(); ?></time> ~ posted in <? the_category('$bull;'); ?></p>
                        
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
                           
               <? the_excerpt(); ?>
               
               <a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">Read more</a>
               
            </article>
         
            <? endwhile; ?>
            
         <? endif; ?>
      
      </div><!-- content -->

      <? get_sidebar(); ?>

   </div><!-- row -->

<? get_footer(); ?>