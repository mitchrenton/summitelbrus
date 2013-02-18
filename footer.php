   <? if(! is_front_page()) : ?>
   
      </div><!-- container -->
      
      <script>
         $.backstretch('<?php bloginfo('template_url'); ?>/images/background.jpg');
      </script>
   <? endif; ?>
      <?php wp_footer(); ?>
   </body>
</html>