
	<footer id="footer">
		<div class="container">
			<div class="row ">
				<div id="footer_left" class="col-sm-6">
					<div id="copyright_text">
						<span class="copyright-legal">
						</span>
					</div> <!-- end of copyright -->
				</div>
				<div id="footer_right_center" class="col-sm-6">
					<div class="socials-links">
					</div>
				</div>

			</div>
		</div>
	</footer> <!-- end of footer -->

	<?php
		// $to_top = codexin_get_option( 'cx_totop' );
		$to_top = true;
		if ( $to_top ) {
			echo '<!-- Go to Top Button at right bottom of the window screen -->';
			echo '<div id="toTop">';
				echo '<i class="fa fa-chevron-up"></i>';
			echo '</div>';
			echo '<!-- Go to Top Button finished-->';
		}
	?>
</div> <!-- end of #whole -->

<?php wp_footer(); ?>

</body>
</html>
