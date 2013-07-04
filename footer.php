    			<footer class="page-footer clearfix">
                    <hr/>
                    <div class="waterloo-logo-container pull-left">

                        <a href="http://orientation.uwaterloo.ca" title="http://orientation.uwaterloo.ca">
                            <img class="waterloo-logo" src="<?php echo get_template_directory_uri(); ?>/images/waterloo_orientation.png">
                        </a>

                    </div>

                    <div class="copyright pull-right">

                        <p>
                            <a href="<?php echo home_url(); ?>" title="Math Orientation" class="pink">&copy; Math Orientation 2013</a>
                        </p>
                        <p>
                            Theme by <a href="http://xeniatay.com" class="pink">Xenia Tay</a>
                            &nbsp;and Theo Belaire
                        </p>
                        <p>
                            <a class="login-admin" href="<?php echo home_url; ?>/wp-admin">Login (admin)</a>
                        </p>
                    </div>

                    <?php //get_footer(); ?>
    			</footer> <!-- end footer -->

            </div> <!-- end .page-container -->

		</div> <!-- end .row-fluid -->

    </div> <!-- end .container-fluid -->

	<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); // js scripts are inserted using this function ?>
</body>
</html>
