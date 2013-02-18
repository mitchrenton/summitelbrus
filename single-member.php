<? get_header(); ?>

   <div class="row">

      <div class="content seven columns">
      
      <? if(have_posts()) : while(have_posts()) : the_post(); ?>
         
         <p class="sub-title">Team Member</p>
   
         <article <? post_class(); ?> id="page-<? the_ID(); ?>">
            
            <h1><? the_title(); ?></h1>
                                    
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
            
            <? the_content(); ?>
            
            <p class="sub-title">Share</p>
            
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style ">
               <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
               <a class="addthis_button_tweet"></a>
               <a class="addthis_button_pinterest_pinit"></a>
               <a class="addthis_counter addthis_pill_style"></a>
            </div>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=mitchrenton"></script>
            <!-- AddThis Button END -->
            
            <? //comments_template(); ?>
         
         </article>
         
         <? endwhile; endif; ?>
   
      </div><!-- content -->
         
   <? get_sidebar(); ?>

   </div><!-- row -->

<? get_footer(); ?>