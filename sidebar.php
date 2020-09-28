<?php

if ( is_page() && is_active_sidebar('codexin-sidebar-page') ) :

	dynamic_sidebar('codexin-sidebar-page');

elseif ( (is_single() && is_active_sidebar('codexin-sidebar-blog') ) || is_home()  ) : 

	dynamic_sidebar('codexin-sidebar-blog');

else: 

	dynamic_sidebar('codexin-sidebar-general');

endif;

?>