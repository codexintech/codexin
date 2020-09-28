<?php

// Office addres by child term 
function test_action(){
	
	$ajax_nonce = $_POST['cx_nonce'];
	$nonce = "no";			       
	 if ( wp_verify_nonce($ajax_nonce, 'ajax-nonce' ) ) {
		$nonce = "Yes";			       
	 }

	 echo $nonce ;
	$args = array(
        'post_type' => 'ohana-courses',
        'posts_per_page' => 1,
        'post__in'			=> array($course_id),
        
    );
	$query = new WP_Query( $args );
	if(false && $query->have_posts() ) :
		// run the loop
		while( $query->have_posts() ): $query->the_post(); ?>
			
			<div class="content-area row">
				<div class="col-md-4">
					<?php 
						echo $nonce.'='.$ajax_nonce;
					?>
				</div>
				<div class="col-md-8">
					<?php the_content(); ?>	
				</div>
				
			</div>

		<?php endwhile;
	else: ?>
		<p><div class="ajax-data-notfound"><?php  echo __('Content empty'); ?></div></p>
	<?php endif;
	wp_reset_postdata();	 			
	die(); // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_test_action', 'test_action'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_test_action', 'test_action'); // wp_ajax_nopriv_{action}

