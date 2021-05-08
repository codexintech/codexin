<?php // Template Name: Page (Right Sidebar) ?>
<?php get_header() ?>

<div id="content" class="section site-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-8">
				<div id="primary" class="site-main">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();?>

							<div id="page-<?php the_ID(); ?>" <?php post_class(array('clearfix', 'page-entry-content single-post-item')); ?>>
								<div class="post-content">
									<?php
										the_content();
										$args = array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'codexin' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
											'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'codexin' ) . ' </span>%',
											'separator'   => '<span class="screen-reader-text">, </span>',
										);
										wp_link_pages( $args );
									?>
								</div>
							</div><!-- #page-## -->

							<?php

						endwhile;
					else :
						// No posts to display
					endif;
					?>

				</div> <!-- end of #primary -->

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>

			<div class="col-12 col-sm-12 col-md-4">
				<aside id="secondary" class="widget-area">
					<?php get_sidebar() ?>
				</aside>
			</div>

		</div><?php // #content .container .row ?>
	</div><?php // #content .container ?>
</div><?php // #content ?>
<?php get_footer() ?>
