<div class="getting-started-top-wrap clearfix">
	<div class="theme-steps-list">
		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 1 - Create a new page with "Home Page" Template', 'total'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Create a new page (any title like Home )', 'total'); ?></li>
				<li><?php echo esc_html__('In right column, select "Home Page" for the option Page Attributes > Template', 'total'); ?> </li>
				<li><?php echo esc_html__('Click on Publish', 'total'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"><?php echo esc_html__('Create New Page', 'total'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 2 - Set "Your homepage displays" to "A Static Page"', 'total'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Go to Appearance > Customize > General settings', 'total'); ?></li>
				<li><?php echo esc_html__('Set "Your homepage displays" to "A Static Page"', 'total'); ?></li>
				<li><?php echo esc_html__('In "Homepage", select the page that you created in the step 1', 'total'); ?></li>
				<li><?php echo esc_html__('Save changes', 'total'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'total'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 3 - Customizer Options Panel', 'total'); ?></h3>
			<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'total'); ?></p>
			<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'total'); ?></a>
		</div>

	</div>

	<div class="theme-image">
		<img src="<?php echo esc_url(get_template_directory_uri(). '/screenshot.png'); ?>" alt="<?php echo esc_html__('Total Plus Demo', 'total'); ?>">

		<div class="theme-steps">
			<h3><?php echo esc_html__('Documentation', 'total'); ?></h3>
			<p><?php echo esc_html__('Read the detailed documentation of the theme. The documentation contain all the necessary information required to setup the theme Total Theme.', 'total'); ?></p>
			<a target="__blank" class="button button-primary" href="https://hashthemes.com/documentation/total-documentation/"><?php echo esc_html__('Read Documentation', 'total'); ?></a>
		</div>
	</div>
</div>

<div class="getting-started-bottom-wrap">
	<h3><?php echo esc_html__('Total Plus Demos - Check the Premium demos. You might be interested in purchasing Premium version.', 'total'); ?></h3>
	<p><?php echo esc_html__('Check out the websites that you can create with the premium version of the Total Theme. These demos can be imported with just one click in the premium version.', 'total'); ?></p>

	<div class="recomended-plugin-wrap clearfix">
		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/main-demo.jpg'); ?>" alt="<?php echo esc_html__('Total Plus Demo', 'total'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title">Main Demo</span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="https://demo.hashthemes.com/total-plus/main/" class="button button-primary"><?php echo esc_html__('Preview', 'total'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri(). '/welcome/css/creative-agency.jpg'); ?>" alt="<?php echo esc_html__('Total Plus Demo', 'total'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title">Creative Agency</span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="https://demo.hashthemes.com/total-plus/creative-agency" class="button button-primary"><?php echo esc_html__('Preview', 'total'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/one-page.jpg'); ?>" alt="<?php echo esc_html__('Total Plus Demo', 'total'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title">One Page</span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="https://demo.hashthemes.com/total-plus/one-page" class="button button-primary"><?php echo esc_html__('Preview', 'total'); ?></a>
				</span>
			</div>
		</div>

	</div>
</div>

<div class="upgrade-box">
	<div class="upgrade-box-text">
		<h3><?php echo esc_html__('Upgrade To Premium Version (7 Days Money Back Guarantee)', 'total'); ?></h3>
		<p><?php echo esc_html__('With Total Theme you can create a beautiful website. But if you want to unlock more possibilites then upgrade to premium version.', 'total'); ?></p>
		<p><?php echo esc_html__('Try the Premium version and check if it fits to your need or not. If not, we have 7 day money back guarantee.', 'total'); ?></p>
	</div>

	<a class="upgrade-button" href="https://hashthemes.com/wordpress-theme/total-plus/" target="_blank"><?php esc_html_e('Upgrade Now', 'total'); ?></a>
</div>