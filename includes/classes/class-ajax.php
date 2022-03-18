<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

if( class_exists(__NAMESPACE__ . '\Ajax') ) return;

/**
 * Class _Ajax
 *
 * Handling ajax requests
 */

final class Ajax{

    /**
     * Initialization
     */
    public static function init(){
        add_action( 'wp_ajax_' . SLUG, [ __CLASS__, 'handle_requests' ] );
	    add_action( 'wp_ajax_nopriv_' . Redirect::js_slug, [ __CLASS__, 'redirect_call_js' ], 0 );
	    add_action( 'wp_ajax_' . Redirect::js_slug, [ __CLASS__, 'redirect_call_js' ], 0 );
    }

	/**
	 * Process call using JS (ajax call)
	 */
	public static function redirect_call_js(){
		Redirect::redirect_rules( true );
	}

	/**
	 * Check wp nonce
	 */
    private static function auth(){
        if( !wp_verify_nonce( $_POST['nonce'], SLUG ) )
            self::response( ['error' => __('Nonce check failure', SLUG) ] );
    }

	/**
	 * Send response
	 *
	 * @param string $data
	 */
    private static function response( $data = '' ){
        die( json_encode( $data ) );
    }

    /**
     * Handle all incoming AJAX requests
     */
    public static function handle_requests(){

        //check nonce
        self::auth();

        //switch between actions
        switch($_POST['do']){

	        case 'save_options':
		        Admin::settings( self::format_settings( $_POST['data'] ), true );
	        	self::response( [ 'error' => '', 'result' => 'ok' ] );
            break;

	        case 'get_lang_selector':
	        	$current_language = 'EN';
		        $options = ( isset( $_POST['data'] ) ? self::format_settings( $_POST['data'], $current_language ) : Admin::settings() );
		        if( empty( $options[ 'lang_country' ] ) ){
		        	$options[ 'lang_country' ] = [ $current_language, ( $current_language === 'SE' ? 'FI' : 'SE' ) ];
		        	$options[ 'lang_blog' ] = [ '#lng-selector-example', '#lng-selector-example' ];
		        }
	        	ob_start();
	        	include ROOT_TPL_PATH . '/lng-selector.php';
		        self::response( [ 'error' => '', 'result' => ob_get_clean() ] );
            break;
        }

        self::response( [ 'error' => sprintf( __( 'No ajax action found for the request "%s"', SLUG ), $_POST['do'] ) ] );

    }

	/**
	 * Format settings from JS to PHP way
	 *
	 * @param array $settings
	 * @param string $current_language
	 *
	 * @return array
	 */
    private static function format_settings( $settings, &$current_language = '' ){
	    $current_language = _self::get_current_language();
    	$r = [];
    	foreach( $settings as $setting )
    		if( false !== strpos( $setting['name'], '[]' ) ){
    		    if ( !empty( $setting['value'] ) )
    			    $r[ str_replace( '[]', '', $setting['name'] ) ][] = $setting['value'];
    	    } else
    	    	$r[ $setting['name'] ] = $setting[ 'value' ];
    	return self::check_lang_rules( $r, $current_language );
    }

	/**
	 * Check all language redirect rules and make proper urls
	 *
	 * @param $options
	 * @param $current_language
	 *
	 * @return mixed
	 */
    private static function check_lang_rules( $options, $current_language ){
	    if( ! empty( $options['lang_country'] ) ) {
	    	if( ! in_array( $current_language, $options['lang_country'] ) ) {
			    $options['lang_country'] = array_merge( [ $current_language ], $options['lang_country'] );
			    $options['lang_blog']    = array_merge( [ 1 ], $options['lang_blog'] );
		    }
	        foreach( $options['lang_blog'] as &$blog_url )
		        if( (int)$blog_url ) $blog_url = get_site_url( $blog_url );
	    }
	    return $options;
    }

}