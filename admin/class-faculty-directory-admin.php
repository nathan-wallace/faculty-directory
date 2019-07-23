<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Faculty_Directory
 * @subpackage Faculty_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Faculty_Directory
 * @subpackage Faculty_Directory/admin
 * @author     Your Name <email@example.com>
 */
class Faculty_Directory_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $faculty_directory    The ID of this plugin.
	 */
	private $faculty_directory;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $faculty_directory       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $faculty_directory, $version ) {

		$this->faculty_directory = $faculty_directory;
		$this->version = $version;
		
		/*registering block via ACF with acf_register_block*/
		add_action('acf/init', 'faculty_directory_acf_init');
		function faculty_directory_acf_init() {

			// check function exists
			if( function_exists('acf_register_block') ) {

				// register a testimonial block
				acf_register_block(array(
					'name'				=> 'faculty-profile',
					'title'				=> __('Faculty Profile'),
					'description'		=> __('A profile block to display faculty and staff.'),
					'render_callback'	=> 'faculty_directory_acf_block_render_callback',
					'category'			=> 'formatting',
					'icon'				=> 'id-alt',
					'mode'              => 'edit',
					'keywords'			=> array( 'faculty', 'user' ),
					'align' 			=> array( 'center', 'wide', 'full' ),
				));
			}
		}
		
		
		function faculty_directory_acf_block_render_callback( $block, $content = '', $is_preview = false) {

			// convert name ("acf/testimonial") into path friendly slug ("faculty-profile")
			$slug = str_replace('acf/', '', $block['name']);
			
			// include a template part from within the "template-parts/block" folder
			// Create class attribute allowing for custom "className" and "align" values.
			$className = 'faculty-profile';
			if( !empty($block['className']) ) {
				$className .= ' ' . $block['className'];
			}
			if( !empty($block['align']) ) {
				$className .= ' align' . $block['align'];
			}
			
			if( file_exists( plugin_dir_path( dirname( __FILE__ ) ) ."public/partials/block-{$slug}.php" ) ) {
				include( plugin_dir_path( dirname( __FILE__ ) ) ."public/partials/block-{$slug}.php" );
			}
			/*USE BELOW IF GUTENBERG IS DIFFERENT FROM FRONT-END*/
			/* 
			if ( is_admin() ) {
				if( file_exists( plugin_dir_path( dirname( __FILE__ ) ) ."admin/partials/content-{$slug}.php" ) ) {
					include( plugin_dir_path( dirname( __FILE__ ) ) ."admin/partials/content-{$slug}.php" );
				}
			}
			else{
				if( file_exists( plugin_dir_path( dirname( __FILE__ ) ) ."public/partials/content-{$slug}.php" ) ) {
					include( plugin_dir_path( dirname( __FILE__ ) ) ."public/partials/content-{$slug}.php" );
				}
			}
			*/
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Faculty_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Faculty_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->faculty_directory, plugin_dir_url( __FILE__ ) . 'css/faculty-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Faculty_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Faculty_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->faculty_directory, plugin_dir_url( __FILE__ ) . 'js/faculty-directory-admin.js', array( 'jquery' ), $this->version, false );

	}

}
