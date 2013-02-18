<? get_header(); ?>

   <div class="row">

      <div class="content seven columns">
      
         <? if(have_posts()) : ?>
         
         <p class="sub-title">Blog</p>
      
         <h1 class="cat"><? single_cat_title(); ?></h1>
         
         <? while(have_posts()) : the_post(); ?>
      
         <article <? post_class(); ?> id="page-<? the_ID(); ?>">
         
            <h2><a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
            
            <p class="meta">Written by <a href="<? the_author_link(); ?>" title="Read all posts written by <? the_author(); ?>"><? the_author(); ?></a> ~ <? the_date(); ?> ~ posted in <? the_category('$bull;'); ?></p>
            
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
         
         <? endwhile; endif; ?>
   
      </div><!-- content -->
   
   <? get_sidebar(); ?>

   </div><!-- row -->

<? get_footer(); ?>