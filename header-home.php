<?php

	$showcase_heading  = codexin_get_option( 'cx_showcase_title' );
	$showcase_subtitle = codexin_get_option( 'cx_showcase_subtitle' );
	$showcase_btn_text = codexin_get_option( 'cx_showcase_btn' );
	$showcase_btn_url  = codexin_get_option( 'cx_showcase_btn_url' );
?>

<div id="showcase" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center-block">
				<?php
				if ( ! empty( $showcase_heading ) ) {
					echo '<h1>' . $showcase_heading . '</h1>';
				}
				?>
				<?php
				if ( ! empty( $showcase_subtitle ) ) {
					echo '<p>' . $showcase_subtitle . '</p>';
				}
				?>
				<i class="fas fa-caret-right"></i>
				<div class="text-center"><a class="codexin_btn_4 "  href="<?php echo $showcase_btn_url; ?>" ><?php echo $showcase_btn_text; ?></a></div>
			</div>
		</div>
	</div>
</div>
