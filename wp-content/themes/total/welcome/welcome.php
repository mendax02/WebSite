<?php
	if(!class_exists('Total_Welcome')) :

		class Total_Welcome {

			public $tab_sections = array();

			public $theme_name = ''; // For storing Theme Name
			public $theme_version = ''; // For Storing Theme Current Version Information
			public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins
			public $pro_plugins = array(); // For Storing the list of the Recommended Pro Plugins

			/**
			 * Constructor for the Welcome Screen
			 */
			public function __construct() {
				
				/** Useful Variables **/
				$theme = wp_get_theme();
				$this->theme_name = $theme->Name;
				$this->theme_version = $theme->Version;

				/** Define Tabs Sections **/
				$this->tab_sections = array(
					'getting_started' => __('Getting Started', 'total'),
					//'recommended_plugins' => __('Recommended Plugins', 'total'),
					'support' => __('Support', 'total'),
					'free_vs_pro' => __('Free Vs Pro', 'total'),
				);

				/** List of Recommended Free Plugins **/
				$this->free_plugins = array(
					/*'accesspress-social-icons' => array(
						'name' => 'AccessPress Social Icons',
						'slug' => 'accesspress-social-icons',
						'filename' => 'accesspress-social-icons',
						'class' => 'APS_Class'
					),*/
				);

				/** List of Recommended Pro Plugins **/
				$this->pro_plugins = array();

				/* Theme Activation Notice */
				add_action( 'admin_notices', array( $this, 'total_activation_admin_notice' ) );

				/* Create a Welcome Page */
				add_action( 'admin_menu', array( $this, 'total_welcome_register_menu' ) );

				/* Enqueue Styles & Scripts for Welcome Page */
				add_action( 'admin_enqueue_scripts', array( $this, 'total_welcome_styles_and_scripts' ) );
			}

			/** Welcome Message Notification on Theme Activation **/
			public function total_activation_admin_notice() {
				global $pagenow;

				if( is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated'])) ) {
					?>
					<div class="notice notice-success is-dismissible"> 
						<p><?php echo esc_html__( 'Thank you for activating Total Theme. Please go to Welcome page and get information on setting up the theme.', 'total' ); ?></p>
						<p><a class="button button-primary" href="<?php echo admin_url('/themes.php?page=total-welcome') ?>"><?php echo esc_html__( 'Let\'s Get Started', 'total' ); ?></a></p>
					</div>
					<?php
				}
			}

			/** Register Menu for Welcome Page **/
			public function total_welcome_register_menu() {
				add_theme_page( esc_html__( 'Welcome', 'total' ), esc_html__( 'Total - Welcome', 'total' ) , 'edit_theme_options', 'total-welcome', array( $this, 'total_welcome_screen' ));
			}

			/** Welcome Page **/
			public function total_welcome_screen() {
				$tabs = $this->tab_sections;
				?>
				<div class="wrap about-wrap access-wrap">
					<div class="abt-promo-wrap clearfix">
						<div class="abt-theme-wrap">
							<h1><?php printf( // WPCS: XSS OK.
								/* translators: 1-theme name, 2-theme version*/
								esc_html__( 'Welcome to %1$s - Version %2$s', 'total' ), $this->theme_name, $this->theme_version ); ?></h1>
							<div class="about-text"><?php echo esc_html__( 'Total as its name suggest is a complete package theme with all the feature that you need to make a complete website. The theme has clean and elegant design with vibrant color(Theme Color Changable Option) and parallax sections. The theme is fully responsive and is built on customizer that enable you to configure the website with live preview. The theme is SEO friendly, Cross browser compatible, fully translation ready and is compatible with WooCommerce and all other major plugins.', 'total' ); ?></div>
						</div>

						<div class="promo-banner-wrap">
							<p><?php esc_html_e('Upgrade for $55', 'total'); ?></p>
							<a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total-plus/'); ?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('Upgrade Now', 'total'); ?></a>
							<a class="promo-offer-text" href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total-plus/'); ?>" target="_blank"><?php echo esc_html__('Unlock all the possibitlies with Total Plus.', 'total'); ?></a>
						</div>
					</div>

					<div class="nav-tab-wrapper clearfix">
						<?php foreach($tabs as $id => $label) : ?>
							<?php
								$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay.
								$nav_class = 'nav-tab';
								if($id == $section) {
									$nav_class .= ' nav-tab-active';
								}
							?>
							<a href="<?php echo esc_url(admin_url('themes.php?page=total-welcome&section='.$id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
								<?php echo esc_html( $label ); ?>
						   	</a>
						<?php endforeach; ?>
				   	</div>

			   		<div class="welcome-section-wrapper">
		   				<?php $section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay. ?>
	   					
	   					<div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
	   						<?php require_once get_template_directory() . '/welcome/sections/'.$section.'.php'; ?>
						</div>
				   	</div>
			   	</div>
				<?php
			}

			/** Enqueue Necessary Styles and Scripts for the Welcome Page **/
			public function total_welcome_styles_and_scripts() {
				wp_enqueue_style( 'total-welcome-screen', get_template_directory_uri() . '/welcome/css/welcome.css' );
			}

			// Check if plugin is installed
			public function total_check_installed_plugin( $slug, $filename ) {
				return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
			}

			// Check if plugin is activated
			public function total_check_plugin_active_state( $slug, $filename ) {
				return is_plugin_active( $slug . '/' . $filename . '.php' ) ? true : false;
			}

			/** Generate Url for the Plugin Button **/
			public function total_plugin_generate_url($status, $slug, $file_name) {
				switch ( $status ) {
					case 'install':
						return wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'install-plugin',
									'plugin' => esc_attr($slug)
								),
								network_admin_url( 'update.php' )
							),
							'install-plugin_' . esc_attr($slug)
						);
						break;

					case 'inactive':
						return add_query_arg( array(
		                      'action'        => 'deactivate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;

					case 'active':
						return add_query_arg( array(
		                      'action'        => 'activate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;
				}
			}

		}

		new Total_Welcome();

	endif;
