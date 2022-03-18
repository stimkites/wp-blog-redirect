<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

if( class_exists( __NAMESPACE__ . '\_self' ) ) return;

final class _self{

	/**
	 * Shortcode value
	 */
	const SHORTCODE = 'wt-lang-select';

	/**
	 * Initialize plugin
	 */
	public static function load(){
		add_shortcode( self::SHORTCODE, [ __CLASS__, 'render_lang_selector' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'add_front_scripts' ], 999 );
		Admin::init();
		Redirect::init();
		Ajax::init();
	}

	/**
	 * Retrieve current language
	 *
	 * @return string
	 */
	public static function get_current_language(){
		return explode( "_", get_locale() )[1];
	}

	/**
	 * Render language selector using shortcode
	 *
	 * @return string
	 */
	public static function render_lang_selector(){
		ob_start();
		include ROOT_TPL_PATH . '/lng-selector.php';
		return ob_get_clean();
	}

	/**
	 * Add styles and scripts to front-end
	 */
	public static function add_front_scripts(){
		wp_enqueue_style(   'wt_rdr_front_css', URL . '/assets/css/front-styles.css', null, time() );
		$options = Admin::settings();
		if( empty( $options['lng_injection'] ) ) return;
		wp_register_script( 'wt_rdr_front_js',  URL . '/assets/js/front.js', [ 'jquery' ] );
		wp_enqueue_script(  'wt_rdr_front_js',  URL . '/assets/js/front.js', [ 'jquery' ], time(), false );
		ob_start();
		include ROOT_TPL_PATH . '/lng-selector.php';
		$body = ob_get_clean();
		wp_localize_script( 'wt_rdr_front_js', 'wt_rdr_fe', [
			'selector'  => $options[ 'lng_injection' ],
			'place'     => $options[ 'lng_injection_place' ],
			'body'      => $body
		] );
	}

}