<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

/**
 * Template: plugin settings
 */

$options = Admin::settings();

?>

<p class="clear"></p>

<div class="wrap wt-brdr-wrap">

	<hr class="wp-header-end">

	<h1 class="inline-header">
		<?php _e( 'Blog redirect', SLUG ); ?>
	</h1>

	<h1 class="screen-reader-text"><?php _e('Blog redirect', SLUG ) ?></h1>

	<p class="clear"></p>

	<form name="mainform" method="post" action=" " enctype="multipart/form-data">

        <h2><?php _e( 'Country redirect', SLUG ) ?></h2>

		<table class="form-table">

			<tbody>

            <tr valign="top">
                <th class="titledesc" scope="row">
                    <label><?php _e( 'Options', SLUG ) ?></label>
                </th>
                <td class="forminp forminp-text">
                    <p><label title="<?php _e('Logged users will never be redirected', SLUG) ?>">
                        <input type="checkbox" name="no_redirect_logged" class="option" value="yes"
                            <?php echo ( !empty( $options['no_redirect_logged'] ) ? 'checked' : '' ) ?>/>
                            <?php _e( 'Do not redirect logged in users', SLUG ) ?>
                    </label></p>
                    <p><label title="<?php
                        _e('Once visitor is redirected, it wont happen again, e.g. if user wants to browse a different blog', SLUG)
                        ?>">
                        <input type="checkbox" name="once_redirect" class="option" value="yes"
                            <?php echo ( !empty( $options['once_redirect'] ) ? 'checked' : '' ) ?>/>
                            <?php _e( 'Redirect only once', SLUG ) ?>
                    </label></p>
                    <p class="description">
                        <?php _e( 'Cookie-based method, if Varnish enabled, cookie "__wt_redirected" must be excluded', SLUG ) ?>
                    </p>
                    <br/>
                    <p><label title="<?php _e('If Varnish is enabled, this is a must', SLUG) ?>">
                            <input type="checkbox" name="use_js_redirect" class="option" value="yes"
				                <?php echo ( !empty( $options['use_js_redirect'] ) ? 'checked' : '' ) ?>/>
			                <?php _e( 'Use javascript redirect', SLUG ) ?>
                        </label></p>
                </td>
            </tr>

			<tr valign="top">
				<th class="titledesc" scope="row">
					<label><?php _e( 'Rules', SLUG ) ?></label>
				</th>
				<td class="forminp forminp-text">
					<table class="widefat" id="global-rules">
						<thead>
						<tr>
							<th width="1%">#</th>
							<th><?php _e( 'From (country code)', SLUG ) ?></th>
							<th><?php _e( 'To (blog or url)', SLUG ) ?></th>
							<th width="1%"></th>
						</tr>
						</thead>
						<tbody>
						<tr class="tpl">
							<td class="autonum" width="1%"></td>
							<td>
								<?php echo Selectors::countries() ?>
							</td>
							<td>
								<?php echo Selectors::blogs() ?>
							</td>
							<td width="1%"><span title="<?php _e( 'Remove rule', SLUG ) ?>"
                                                 class="remove-button"></span></td>
						</tr>
                        <tr class="no-rules">
                            <td colspan="100%">
                                <p><?php _e('No rules defined yet...', SLUG) ?></p>
                            </td>
                        </tr>
						</tbody>
						<tfoot>
						<tr>
							<th colspan="100%">
								<a class="button button-secondary add-rule"><?php _e('Add rule', SLUG) ?></a>
							</th>
						</tr>
						</tfoot>
					</table>
				</td>
			</tr>

            </tbody>

        </table>

        <h2><?php _e( 'Language redirect', SLUG ) ?></h2>

        <table class="form-table lng-selector-for">

            <tbody>

			<tr valign="top">
				<th class="titledesc" scope="row">
					<label><?php _e( 'Options', SLUG ) ?></label>
				</th>
				<td class="forminp forminp-text">
                    <label class="option-label"
                           title="<?php _e('Selector appearance', SLUG) ?>"><?php _e('Form', SLUG) ?>:</label>
                    <div style="max-width: 400px">
                        <?php echo Selectors::lng_forms( 'lng_sel_form', $options[ 'lng_sel_form' ] ) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="forminp forminp-text">
                    <table class="form-table">
                        <tr valign="top">
                            <td class="forminp forminp-text">
                                <label class="option-label" title="<?php _e('Elements type', SLUG) ?>"><?php
                                    _e('Type', SLUG) ?>: </label>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_type"
                                                 value="icons" <?php echo ( $options['lng_sel_type'] === 'icons'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Icons', SLUG ) ?> </label></p>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_type"
                                                 value="labels" <?php echo ( $options['lng_sel_type'] === 'labels'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Labels', SLUG ) ?> </label></p>
                            </td>
                            <td class="forminp forminp-text">
                                <label class="option-label" title="<?php _e('Elements shape', SLUG) ?>"><?php
                                    _e('Shape', SLUG) ?>: </label>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_shape"
                                                 value="circle" <?php echo ( $options['lng_sel_shape'] === 'circle'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Ellipse', SLUG ) ?> </label></p>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_shape"
                                                 value="rect" <?php echo ( $options['lng_sel_shape'] === 'rect'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Rectangle', SLUG ) ?> </label></p>
                            </td>
                            <td class="forminp forminp-text">
                                <label class="option-label" title="<?php _e('Selector size', SLUG) ?>"><?php
                                    _e('Size', SLUG) ?>: </label>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_size"
                                                 value="normal" <?php echo ( $options['lng_sel_size'] === 'normal'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Normal', SLUG ) ?> </label></p>
                                <p><label><input type="radio" class="option render-example" name="lng_sel_size"
                                                 value="bigger" <?php echo ( $options['lng_sel_size'] === 'bigger'
                                                                    ? 'checked' : '' ) ?> />
                                        <?php _e( 'Bigger', SLUG ) ?> </label></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="forminp forminp-text">
                    <a name="lng-selector-example"></a>
                    <label class="option-label"><?php _e('Example', SLUG ) ?>:</label><div id="lng-selector-example"></div>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="forminp forminp-text">
                    <label class="option-label"
                           title="<?php _e('Place/position of the element', SLUG) ?>">
		                <?php _e('Place', SLUG) ?>:
                    </label>
                    <p>
	                    <?php echo sprintf(
		                    __('Shortcode "[%s]" ', SLUG ),
		                    '<b>' . _self::SHORTCODE . '</b>'
	                    ) ?>
                    </p>
                    <p><label title="<?php _e('The element will be appended/prepended with the selector', SLUG) ?>">
                            <?php _e( 'Or DOM element', SLUG) ?>:
                            <input type="text" class="option" name="lng_injection" placeholder="#mydiv"
                                   value="<?php echo $options['lng_injection'] ?>"/></label>
                    <label>
                        <input type="radio" class="option" name="lng_injection_place" value="prepend"
                            <?php echo ( $options['lng_injection_place'] === 'prepend' ? 'checked' : '' ) ?> />
		                <?php _e('Prepend', SLUG ) ?>
                    </label>
                    <label>
                        <input type="radio" class="option" name="lng_injection_place" value="append"
	                        <?php echo ( $options['lng_injection_place'] === 'append' ? 'checked' : '' ) ?> />
		                <?php _e('Append', SLUG ) ?>
                    </label>
                    </p>
                </td>
            </tr>

			<tr valign="top">
				<th class="titledesc" scope="row">
					<label><?php _e( 'Rules', SLUG ) ?></label>
				</th>
				<td class="forminp forminp-text">
					<table class="widefat" id="lang-rules">
						<thead>
						<tr>
                            <td width="1%"><span class="dnd-tip" title="<?php _e('Use this list to order rules', SLUG) ?>"></span</td>
							<th><?php _e( 'For language/country', SLUG ) ?></th>
							<th><?php _e( 'To (blog or url)', SLUG ) ?></th>
							<th width="1%"></th>
						</tr>
						</thead>
						<tbody class="dnd-list">
						<tr class="tpl">
                            <td class="dnd-list-handle" width="1%"></td>
							<td>
								<?php echo Selectors::countries( 'lang_country', '', false ) ?>
							</td>
							<td>
								<?php echo Selectors::blogs( 'lang_blog' ) ?>
							</td>
							<td width="1%"><span title="<?php _e( 'Remove rule', SLUG ) ?>" class="remove-button"></span></td>
						</tr>
                        <tr class="no-rules">
                            <td colspan="100%">
                                <p><?php _e('No rules defined yet...', SLUG) ?></p>
                            </td>
                        </tr>
						</tbody>
						<tfoot>
						<tr>
							<th colspan="100%">
								<a class="button button-secondary add-rule"><?php _e('Add rule', SLUG) ?></a>
								<a class="button button-secondary go-render-example"><?php _e('Render', SLUG) ?></a>
							</th>
						</tr>
						</tfoot>
					</table>
				</td>
			</tr>

			</tbody>

		</table>

        <a class="button button-primary" id="save-options"><?php _e('Save options', SLUG) ?></a>

	</form>

</div>