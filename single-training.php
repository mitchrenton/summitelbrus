<? get_header(); ?>

</header>

   <div class="row">

      <div class="breadcrumb">
          <p>You are here: <a href="<? bloginfo('url'); ?>">Home</a> &raquo; <a href="<? bloginfo('url'); ?>/training">Training</a> &raquo <? the_title(); ?></p>
       </div>

      <div class="content seven columns">
      
      <? if(have_posts()) : ?>
      
          <p class="sub-title">Training</p>
      
         <? while(have_posts()) : the_post(); ?>
   
         <article <? post_class(); ?> id="page-<? the_ID(); ?>">
            
            <h1><? the_title(); ?></h1>
                        
            <? $location = get_field('training_location'); ?>
            
            <? if($location) : ?>
                        
               <p class="meta"><span>Location:</span> <? echo $location['address']; ?> | <span>Co-ordinates:</span> <? echo $location['coordinates']; ?></p>
               
               <img src="http://maps.google.com/maps/api/staticmap?center=<? echo $location['coordinates']; ?>&zoom=8&size=518x200&sensor=false" />
            
            <? endif; ?>
            
            <? the_content(); ?>
            
            <? //comments_template(); ?>
         
         </article>
         
         <? endwhile; endif; ?>
   
      </div><!-- content -->
         
   <? get_sidebar(); ?>

   </div><!-- row -->

<? get_footer(); ?>