<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

if( class_exists( __NAMESPACE__ . '\Redirect' ) ) return;

final class Redirect {

	const js_slug = 'wetail_js_redirection';

	/**
	 * Initiate redirection rules
	 */
	public static function init() {
		add_action( 'template_redirect', [ __CLASS__, 'redirect_rules' ], 0 );
		add_action( 'wp_head', [ __CLASS__, 'inject_js' ] );
	}

	/**
	 * inject straight JS for checking if we need to redirect
	 */
	public static function inject_js(){
		if( is_user_logged_in()
		    || empty( Admin::settings('use_js_redirect') )
			|| self::is_redirected( Admin::settings() ) ) return;
		?>
		<style>
			body {
				opacity: 0;
				transition: opacity 200ms ease-in;
			}
		</style>
		<script type="text/javascript" defer>
            var XHR = new XMLHttpRequest();
            XHR.open( "POST", "<?php echo admin_url('admin-ajax.php') ?>", true );
            var formData = new FormData();
            formData.append( "action", "<?php echo self::js_slug ?>" );
            XHR.send( formData );

            XHR.onreadystatechange = function() {
                if(XHR.readyState === 4) {
                    if(XHR.status === 200) {
                        var json = JSON.parse( XHR.responseText );
                        if( json.redirect )
                            window.location.href = json.redirect;
                        else
                            document.body.style.opacity = "1";
                    } else {
                        console.log("There was a problem in fetching API data on attempt to redirect...");
                    }
                }
            }
		</script>
		<?php
	}

	/**
	 * Rules on redirecting
	 *
	 * @param bool $js_call
	 * @return null
	 */
	public static function redirect_rules( $js_call = false ){
		if( ! class_exists( 'WC_Geolocation' ) ) return self::response( $js_call );
		$options = Admin::settings();
		if( ! empty( $options['no_redirect_logged'] ) && is_user_logged_in() ) return self::response( $js_call );
		if( empty( $options['country'] ) ) return self::response( $js_call );
		if( self::is_redirected( $options ) ) return self::response( $js_call );
		$location = \WC_Geolocation::geolocate_ip( '', true, false );
		foreach( $options['country'] as $bi=>$redirects ){
			if( ! is_array( $redirects ) )
				$redirects = [ $redirects ];
			if( in_array( $location['country'], $redirects )
			        && ! empty( $options['blog'][ $bi ] )
			            && site_url() !== $options[ 'blog' ][ $bi ]
                            && self::get_current_url() !== $options[ 'blog' ][ $bi ] ) {
				self::set_redirected( $options );
				return self::response( $js_call, $options[ 'blog' ][ $bi ] );
			}
		}
		self::set_redirected( $options );
		return self::response( $js_call );
	}

	/**
	 * Send response
	 *
	 * @param bool $js_call
	 * @param string $data
	 *
	 * @return null;
	 */
	protected static function response( $js_call = false, $data = '' ){
		if( $js_call )
			die( json_encode( [ 'redirect' => $data ] ) );
		if( $data ) {
			header( 'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0' );
			header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
			header( 'Location:' . $data, true, 307 );
			exit;
		}
		return null;
	}

    /**
     * Fetch current full URL
     *
     * @return string
     */
	protected static function get_current_url(){
	    return ( $_SERVER['HTTPS'] ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    /**
     * Check if client was already redirected
     *
     * @param array $options
     *
     * @return bool
     */
	protected static function is_redirected( $options ){
        return ! empty( $options['once_redirect'] )
            && ! empty( $_COOKIE[ '__wt_redirected' ] );
    }


    /**
     * Set redirected flag
     *
     * @param array $options
     */
	protected static function set_redirected( $options ){
        if( ! empty( $options['once_redirect'] ) )
            setcookie( '__wt_redirected', 1, time() + (86400 * 30), "/" );
    }

}