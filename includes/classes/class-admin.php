<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

if( class_exists( __NAMESPACE__ . '\Admin' ) ) return;

final class Admin {

	/**
	 * Options of the plugin
	 *
	 * @var array
	 */
	private static $options = [
		'defaults'      => true,
		'country'       => [],
		'blog'          => [],
		'lng_sel_form'  => 'dropdown',
		'lng_sel_type'  => 'icons',
		'lng_sel_shape' => 'circle',
		'lng_sel_size'  => 'normal',
		'lang_country'  => [],
		'lang_blog'     => [],
		'lng_injection_place' => 'prepend',
		'lng_injection' => ''
	];

	/**
	 * Initialization
	 */
	public static function init() {
		$multi = defined( 'MULTISITE' ) && MULTISITE;
		if ( ! $multi ) {
			add_action( 'admin_menu', [ __CLASS__, 'add_admin_menu' ] );
		} else {
			add_action( 'network_admin_menu', [ __CLASS__, 'add_network_admin_menu' ] );
		}
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'add_admin_scripts' ], 999 );
		add_filter( 'plugin_action_links_' . PLUGIN_ID, [ __CLASS__, 'settings_link' ] );
	}


	/**
	 * Fetch or set options
	 *
	 * @param string | array $key
	 * @param bool $set
	 *
	 * @return array | string
	 */
	public static function settings( $key = '', $set = false ){
		if( $set )
			return ( self::$options = $key && update_site_option( SLUG, $key ) );
		if( !empty( self::$options['defaults'] ) ){
			$opts = get_site_option( SLUG );
			if( $opts )
				self::$options = $opts;
		}
		$opts = self::$options;
		if( $key ) return ( !empty( $opts[$key] ) ? $opts[$key] : '' );
		return $opts;
	}


	/**
	 * Link to backend settings
	 *
	 * @param $l
	 * @return array
	 */
	public static function settings_link( $l ) {
		return array_merge( [
			'<a href="' . admin_url(
				( defined( 'MULTISITE' ) && MULTISITE
					? 'network/settings.php?page=' . SLUG
					: 'tools.php?page=' . SLUG
				)
			) . '">' . __( 'Settings', SLUG ) . '</a>'
		],
			$l
		);
	}

	/**
	 * Add styles and scripts to back-end
	 */
	public static function add_admin_scripts(){
		if( !isset( $_REQUEST['page'] ) || SLUG !== $_REQUEST['page'] ) return;
		wp_enqueue_style(   'wt_rdr_be', URL . '/assets/css/admin-styles.css', null, time() );
		wp_enqueue_style(   'wt_rdr_bef', URL . '/assets/css/front-styles.css', null, time() );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-blockui' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
		wp_register_script( 'wt_rdr_be',  URL . '/assets/js/default.js', [ 'jquery', 'jquery-blockui', 'jquery-ui-sortable' ] );
		wp_enqueue_script(  'wt_rdr_be',  URL . '/assets/js/default.js', [ 'jquery', 'jquery-blockui', 'jquery-ui-sortable' ], time(), false );
		wp_localize_script( 'wt_rdr_be', 'wt_rdr', [
			'nonce'  => wp_create_nonce( SLUG ),
			'action' => SLUG,
			'rules'  => self::settings()
		] );
		wp_enqueue_style(   'wt_s2_be', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css' );
		wp_enqueue_script(  'wt_s2_be',  'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js' );
	}

	/**
	 * Adding admin menus
	 */
	public static function add_admin_menu(){
		$admin_page = add_management_page(
			__( 'Blog Redirect', SLUG),
			__( 'Blog Redirect', SLUG),
			'manage_options',
			SLUG,
			function (){
				include ROOT_TPL_PATH . '/admin-settings.php';
			}
		);
		//Load help
		add_action( 'load-'.$admin_page,	[ __CLASS__, 'load_help_tab' ] );
	}

	/**
	 * Adding admin menus
	 */
	public static function add_network_admin_menu(){
		$admin_page = add_submenu_page(
			'settings.php',
			__( 'Blog Redirect', SLUG ),
			__( 'Blog Redirect', SLUG ),
			'manage_options',
			SLUG,
			function (){
				include ROOT_TPL_PATH . '/admin-settings.php';
			}
		);
		add_action( 'load-'.$admin_page,	[ __CLASS__, 'load_help_tab' ] );
	}

	/**
	 * Load help file into help tab
	 */
	public static function load_help_tab(){
		$screen = get_current_screen();
		$help = file_get_contents( ASSETS_PATH . "/help/help.html" );
		$ti = 0;
		$pos = strpos( $help, '<tab>' );
		while( false !== $pos ){
			$title_start = strpos( $help, '<h3>', $pos ) + 4;
			$title = substr( $help, $title_start, strpos( $help, '</h3>', $title_start ) - $title_start );
			$end_content = strpos( $help, '</tab>', $pos + 5 );
			$content = substr( $help, $pos, $end_content - $pos );
			$screen->add_help_tab( [
				'id'	=> 'wtssms_help_tab_' . ++$ti,
				'title'	=> $title,
				'content'	=> $content
			] );
			$pos = strpos( $help, '<tab>', $end_content + 6 );
		}
	}

}