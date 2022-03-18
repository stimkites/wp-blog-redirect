<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

/**
 * Template: language selector
 *
 * @global array $options
 */

$current_language = _self::get_current_language();

?>

<div class="wt-lang-toggle
            size-<?php echo $options['lng_sel_size'] ?>
            type-<?php echo $options['lng_sel_type'] ?>
            shape-<?php echo $options['lng_sel_shape'] ?>
            form-<?php echo $options['lng_sel_form'] ?>"
     <?php echo ( 'icons' === $options['lng_sel_type'] && 'dropdown' === $options['lng_sel_form']
                    ? 'style="background-image: url( https://lipis.github.io/flag-icon-css/flags/1x1/'
                        . strtolower( $current_language ) . '.svg )">'
                    : '>' . ( 'dropdown' === $options['lng_sel_form'] ? '<span>' . $current_language . '</span>' : '' )
                    ) ?>
    <ul class="lang-nav">
	<?php
    foreach( $options['lang_country'] as $index => $code )
	    echo '<li class="' . ( $current_language === $code ? 'selected' : '' ) . '">
	            <a href="' . $options['lang_blog'][$index] . '"
	            ' . ( 'icons' === $options['lng_sel_type']
                        ? 'style="background-image: url( https://lipis.github.io/flag-icon-css/flags/1x1/'
                            . strtolower( $code ) . '.svg )">'
                        : '><span>' . $code  ) . '</span></a>
              </li>';
    ?>
    </ul>
</div>