
   
   <? if(! is_front_page()) : ?>
   
      </div><!-- container -->
      
      <script>
         $.backstretch('<?php bloginfo('template_url'); ?>/images/background.jpg');
      </script>
   <? endif; ?>
      
      <footer>
         
         <p>Content &copy; Copyright <? echo the_date('Y'); ?> - <? bloginfo('name'); ?></p>
      
      </footer>
   
      <?php wp_footer(); ?>
   </body>
</html>