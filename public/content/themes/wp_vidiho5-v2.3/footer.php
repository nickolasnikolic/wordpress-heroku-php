<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="footer-inner">
					<div class="row">
						<div class="col-sm-4">
							<?php dynamic_sidebar( 'footer-widgets' ); ?>
						</div>
						<div class="col-sm-4">
							<?php dynamic_sidebar( 'footer-widgets-1' ); ?>
						</div>
						<div class="col-sm-4">
							<?php dynamic_sidebar( 'footer-widgets-2' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copy">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="copy-inner">
						<div class="row">
							<div class="col-sm-6">
								<p><?php echo ci_footer(); ?></p>
							</div>

							<div class="col-sm-6 text-right">
								<p><?php echo ci_footer( 'secondary' ); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</div> <!-- #page -->
</body>
</html>