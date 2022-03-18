<?php

namespace Wetail\Blog\Redirect;

defined( __NAMESPACE__ . '\SLUG' ) or die();

if( class_exists( __NAMESPACE__ . '\Selectors' ) ) return;

final class Selectors {

	public static function __lng_forms(){
		return [
			'dropdown'  => __( 'Drop down list', SLUG ),
			'horlist'   => __( 'Horizontal list', SLUG ),
			'verlist'   => __( 'Vertical list', SLUG )
		];
	}

	public static function __countries(){
		return [
			'AF' => __( 'Afghanistan', SLUG ),
			'AX' => __( '&#197;land Islands', SLUG ),
			'AL' => __( 'Albania', SLUG ),
			'DZ' => __( 'Algeria', SLUG ),
			'AS' => __( 'American Samoa', SLUG ),
			'AD' => __( 'Andorra', SLUG ),
			'AO' => __( 'Angola', SLUG ),
			'AI' => __( 'Anguilla', SLUG ),
			'AQ' => __( 'Antarctica', SLUG ),
			'AG' => __( 'Antigua and Barbuda', SLUG ),
			'AR' => __( 'Argentina', SLUG ),
			'AM' => __( 'Armenia', SLUG ),
			'AW' => __( 'Aruba', SLUG ),
			'AU' => __( 'Australia', SLUG ),
			'AT' => __( 'Austria', SLUG ),
			'AZ' => __( 'Azerbaijan', SLUG ),
			'BS' => __( 'Bahamas', SLUG ),
			'BH' => __( 'Bahrain', SLUG ),
			'BD' => __( 'Bangladesh', SLUG ),
			'BB' => __( 'Barbados', SLUG ),
			'BY' => __( 'Belarus', SLUG ),
			'BE' => __( 'Belgium', SLUG ),
			'PW' => __( 'Belau', SLUG ),
			'BZ' => __( 'Belize', SLUG ),
			'BJ' => __( 'Benin', SLUG ),
			'BM' => __( 'Bermuda', SLUG ),
			'BT' => __( 'Bhutan', SLUG ),
			'BO' => __( 'Bolivia', SLUG ),
			'BQ' => __( 'Bonaire, Saint Eustatius and Saba', SLUG ),
			'BA' => __( 'Bosnia and Herzegovina', SLUG ),
			'BW' => __( 'Botswana', SLUG ),
			'BV' => __( 'Bouvet Island', SLUG ),
			'BR' => __( 'Brazil', SLUG ),
			'IO' => __( 'British Indian Ocean Territory', SLUG ),
			'VG' => __( 'British Virgin Islands', SLUG ),
			'BN' => __( 'Brunei', SLUG ),
			'BG' => __( 'Bulgaria', SLUG ),
			'BF' => __( 'Burkina Faso', SLUG ),
			'BI' => __( 'Burundi', SLUG ),
			'KH' => __( 'Cambodia', SLUG ),
			'CM' => __( 'Cameroon', SLUG ),
			'CA' => __( 'Canada', SLUG ),
			'CV' => __( 'Cape Verde', SLUG ),
			'KY' => __( 'Cayman Islands', SLUG ),
			'CF' => __( 'Central African Republic', SLUG ),
			'TD' => __( 'Chad', SLUG ),
			'CL' => __( 'Chile', SLUG ),
			'CN' => __( 'China', SLUG ),
			'CX' => __( 'Christmas Island', SLUG ),
			'CC' => __( 'Cocos (Keeling) Islands', SLUG ),
			'CO' => __( 'Colombia', SLUG ),
			'KM' => __( 'Comoros', SLUG ),
			'CG' => __( 'Congo (Brazzaville)', SLUG ),
			'CD' => __( 'Congo (Kinshasa)', SLUG ),
			'CK' => __( 'Cook Islands', SLUG ),
			'CR' => __( 'Costa Rica', SLUG ),
			'HR' => __( 'Croatia', SLUG ),
			'CU' => __( 'Cuba', SLUG ),
			'CW' => __( 'Cura&ccedil;ao', SLUG ),
			'CY' => __( 'Cyprus', SLUG ),
			'CZ' => __( 'Czech Republic', SLUG ),
			'DK' => __( 'Denmark', SLUG ),
			'DJ' => __( 'Djibouti', SLUG ),
			'DM' => __( 'Dominica', SLUG ),
			'DO' => __( 'Dominican Republic', SLUG ),
			'EC' => __( 'Ecuador', SLUG ),
			'EG' => __( 'Egypt', SLUG ),
			'SV' => __( 'El Salvador', SLUG ),
			'GQ' => __( 'Equatorial Guinea', SLUG ),
			'ER' => __( 'Eritrea', SLUG ),
			'EE' => __( 'Estonia', SLUG ),
			'ET' => __( 'Ethiopia', SLUG ),
			'FK' => __( 'Falkland Islands', SLUG ),
			'FO' => __( 'Faroe Islands', SLUG ),
			'FJ' => __( 'Fiji', SLUG ),
			'FI' => __( 'Finland', SLUG ),
			'FR' => __( 'France', SLUG ),
			'GF' => __( 'French Guiana', SLUG ),
			'PF' => __( 'French Polynesia', SLUG ),
			'TF' => __( 'French Southern Territories', SLUG ),
			'GA' => __( 'Gabon', SLUG ),
			'GM' => __( 'Gambia', SLUG ),
			'GE' => __( 'Georgia', SLUG ),
			'DE' => __( 'Germany', SLUG ),
			'GH' => __( 'Ghana', SLUG ),
			'GI' => __( 'Gibraltar', SLUG ),
			'GR' => __( 'Greece', SLUG ),
			'GL' => __( 'Greenland', SLUG ),
			'GD' => __( 'Grenada', SLUG ),
			'GP' => __( 'Guadeloupe', SLUG ),
			'GU' => __( 'Guam', SLUG ),
			'GT' => __( 'Guatemala', SLUG ),
			'GG' => __( 'Guernsey', SLUG ),
			'GN' => __( 'Guinea', SLUG ),
			'GW' => __( 'Guinea-Bissau', SLUG ),
			'GY' => __( 'Guyana', SLUG ),
			'HT' => __( 'Haiti', SLUG ),
			'HM' => __( 'Heard Island and McDonald Islands', SLUG ),
			'HN' => __( 'Honduras', SLUG ),
			'HK' => __( 'Hong Kong', SLUG ),
			'HU' => __( 'Hungary', SLUG ),
			'IS' => __( 'Iceland', SLUG ),
			'IN' => __( 'India', SLUG ),
			'ID' => __( 'Indonesia', SLUG ),
			'IR' => __( 'Iran', SLUG ),
			'IQ' => __( 'Iraq', SLUG ),
			'IE' => __( 'Ireland', SLUG ),
			'IM' => __( 'Isle of Man', SLUG ),
			'IL' => __( 'Israel', SLUG ),
			'IT' => __( 'Italy', SLUG ),
			'CI' => __( 'Ivory Coast', SLUG ),
			'JM' => __( 'Jamaica', SLUG ),
			'JP' => __( 'Japan', SLUG ),
			'JE' => __( 'Jersey', SLUG ),
			'JO' => __( 'Jordan', SLUG ),
			'KZ' => __( 'Kazakhstan', SLUG ),
			'KE' => __( 'Kenya', SLUG ),
			'KI' => __( 'Kiribati', SLUG ),
			'KW' => __( 'Kuwait', SLUG ),
			'KG' => __( 'Kyrgyzstan', SLUG ),
			'LA' => __( 'Laos', SLUG ),
			'LV' => __( 'Latvia', SLUG ),
			'LB' => __( 'Lebanon', SLUG ),
			'LS' => __( 'Lesotho', SLUG ),
			'LR' => __( 'Liberia', SLUG ),
			'LY' => __( 'Libya', SLUG ),
			'LI' => __( 'Liechtenstein', SLUG ),
			'LT' => __( 'Lithuania', SLUG ),
			'LU' => __( 'Luxembourg', SLUG ),
			'MO' => __( 'Macao S.A.R., China', SLUG ),
			'MK' => __( 'Macedonia', SLUG ),
			'MG' => __( 'Madagascar', SLUG ),
			'MW' => __( 'Malawi', SLUG ),
			'MY' => __( 'Malaysia', SLUG ),
			'MV' => __( 'Maldives', SLUG ),
			'ML' => __( 'Mali', SLUG ),
			'MT' => __( 'Malta', SLUG ),
			'MH' => __( 'Marshall Islands', SLUG ),
			'MQ' => __( 'Martinique', SLUG ),
			'MR' => __( 'Mauritania', SLUG ),
			'MU' => __( 'Mauritius', SLUG ),
			'YT' => __( 'Mayotte', SLUG ),
			'MX' => __( 'Mexico', SLUG ),
			'FM' => __( 'Micronesia', SLUG ),
			'MD' => __( 'Moldova', SLUG ),
			'MC' => __( 'Monaco', SLUG ),
			'MN' => __( 'Mongolia', SLUG ),
			'ME' => __( 'Montenegro', SLUG ),
			'MS' => __( 'Montserrat', SLUG ),
			'MA' => __( 'Morocco', SLUG ),
			'MZ' => __( 'Mozambique', SLUG ),
			'MM' => __( 'Myanmar', SLUG ),
			'NA' => __( 'Namibia', SLUG ),
			'NR' => __( 'Nauru', SLUG ),
			'NP' => __( 'Nepal', SLUG ),
			'NL' => __( 'Netherlands', SLUG ),
			'NC' => __( 'New Caledonia', SLUG ),
			'NZ' => __( 'New Zealand', SLUG ),
			'NI' => __( 'Nicaragua', SLUG ),
			'NE' => __( 'Niger', SLUG ),
			'NG' => __( 'Nigeria', SLUG ),
			'NU' => __( 'Niue', SLUG ),
			'NF' => __( 'Norfolk Island', SLUG ),
			'MP' => __( 'Northern Mariana Islands', SLUG ),
			'KP' => __( 'North Korea', SLUG ),
			'NO' => __( 'Norway', SLUG ),
			'OM' => __( 'Oman', SLUG ),
			'PK' => __( 'Pakistan', SLUG ),
			'PS' => __( 'Palestinian Territory', SLUG ),
			'PA' => __( 'Panama', SLUG ),
			'PG' => __( 'Papua New Guinea', SLUG ),
			'PY' => __( 'Paraguay', SLUG ),
			'PE' => __( 'Peru', SLUG ),
			'PH' => __( 'Philippines', SLUG ),
			'PN' => __( 'Pitcairn', SLUG ),
			'PL' => __( 'Poland', SLUG ),
			'PT' => __( 'Portugal', SLUG ),
			'PR' => __( 'Puerto Rico', SLUG ),
			'QA' => __( 'Qatar', SLUG ),
			'RE' => __( 'Reunion', SLUG ),
			'RO' => __( 'Romania', SLUG ),
			'RU' => __( 'Russia', SLUG ),
			'RW' => __( 'Rwanda', SLUG ),
			'BL' => __( 'Saint Barth&eacute;lemy', SLUG ),
			'SH' => __( 'Saint Helena', SLUG ),
			'KN' => __( 'Saint Kitts and Nevis', SLUG ),
			'LC' => __( 'Saint Lucia', SLUG ),
			'MF' => __( 'Saint Martin (French part)', SLUG ),
			'SX' => __( 'Saint Martin (Dutch part)', SLUG ),
			'PM' => __( 'Saint Pierre and Miquelon', SLUG ),
			'VC' => __( 'Saint Vincent and the Grenadines', SLUG ),
			'SM' => __( 'San Marino', SLUG ),
			'ST' => __( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', SLUG ),
			'SA' => __( 'Saudi Arabia', SLUG ),
			'SN' => __( 'Senegal', SLUG ),
			'RS' => __( 'Serbia', SLUG ),
			'SC' => __( 'Seychelles', SLUG ),
			'SL' => __( 'Sierra Leone', SLUG ),
			'SG' => __( 'Singapore', SLUG ),
			'SK' => __( 'Slovakia', SLUG ),
			'SI' => __( 'Slovenia', SLUG ),
			'SB' => __( 'Solomon Islands', SLUG ),
			'SO' => __( 'Somalia', SLUG ),
			'ZA' => __( 'South Africa', SLUG ),
			'GS' => __( 'South Georgia/Sandwich Islands', SLUG ),
			'KR' => __( 'South Korea', SLUG ),
			'SS' => __( 'South Sudan', SLUG ),
			'ES' => __( 'Spain', SLUG ),
			'LK' => __( 'Sri Lanka', SLUG ),
			'SD' => __( 'Sudan', SLUG ),
			'SR' => __( 'Suriname', SLUG ),
			'SJ' => __( 'Svalbard and Jan Mayen', SLUG ),
			'SZ' => __( 'Swaziland', SLUG ),
			'SE' => __( 'Sweden', SLUG ),
			'CH' => __( 'Switzerland', SLUG ),
			'SY' => __( 'Syria', SLUG ),
			'TW' => __( 'Taiwan', SLUG ),
			'TJ' => __( 'Tajikistan', SLUG ),
			'TZ' => __( 'Tanzania', SLUG ),
			'TH' => __( 'Thailand', SLUG ),
			'TL' => __( 'Timor-Leste', SLUG ),
			'TG' => __( 'Togo', SLUG ),
			'TK' => __( 'Tokelau', SLUG ),
			'TO' => __( 'Tonga', SLUG ),
			'TT' => __( 'Trinidad and Tobago', SLUG ),
			'TN' => __( 'Tunisia', SLUG ),
			'TR' => __( 'Turkey', SLUG ),
			'TM' => __( 'Turkmenistan', SLUG ),
			'TC' => __( 'Turks and Caicos Islands', SLUG ),
			'TV' => __( 'Tuvalu', SLUG ),
			'UG' => __( 'Uganda', SLUG ),
			'UA' => __( 'Ukraine', SLUG ),
			'AE' => __( 'United Arab Emirates', SLUG ),
			'GB' => __( 'United Kingdom (UK)', SLUG ),
			'US' => __( 'United States (US)', SLUG ),
			'UM' => __( 'United States (US) Minor Outlying Islands', SLUG ),
			'VI' => __( 'United States (US) Virgin Islands', SLUG ),
			'UY' => __( 'Uruguay', SLUG ),
			'UZ' => __( 'Uzbekistan', SLUG ),
			'VU' => __( 'Vanuatu', SLUG ),
			'VA' => __( 'Vatican', SLUG ),
			'VE' => __( 'Venezuela', SLUG ),
			'VN' => __( 'Vietnam', SLUG ),
			'WF' => __( 'Wallis and Futuna', SLUG ),
			'EH' => __( 'Western Sahara', SLUG ),
			'WS' => __( 'Samoa', SLUG ),
			'YE' => __( 'Yemen', SLUG ),
			'ZM' => __( 'Zambia', SLUG ),
			'ZW' => __( 'Zimbabwe', SLUG )
		];
	}

	public static function countries( $name = 'country', $selected = '', $multiple = true ) {
		$r = '<select class="select2-new render-example option" '
		     . ( $multiple ? 'multiple="multiple"' : '' ) . 'name="'.$name.'[]" >';
		foreach ( self::__countries() as  $code=>$country )
			$r .= '<option value="'.$code.'" ' . ( $code === $selected ? 'selected' : '' ) . '>'.$country.'</option>';
		if( !$selected && !$multiple )
			$r .= '<option value="" selected disabled>...</option>';
		$r .= '</select>';
		return $r;
	}

	public static function languages( $name = 'language', $selected = '' ) {
		ob_start();
		wp_dropdown_languages( [
			'name'      => $name . '[]',
			'selected'  => $selected,
			'class'     => 'select2-new render-example option'
		] );
		return ob_get_clean();
	}


	public static function blogs( $name = 'blog', $selected = '' ){
		$r = '<select class="select2-new-blogs option" name="'.$name.'[]" >';
		foreach ( get_sites() as $blog )
			$r .= '<option value="'.get_site_url( $blog->blog_id ).'" '
			      . ( $blog->blog_id === $selected ? 'selected' : '' ) . '>'.$blog->domain . $blog->path.'</option>';
		if( empty( $selected ) )
			$r .= '<option value="" selected disabled>...</option>';
		$r .= '</select>';
		return $r;
	}

	public static function lng_forms( $name = 'lng_sel_form', $selected = '' ){
		$r = '<select class="select2-forms option" name="'.$name.'" >';
		foreach ( self::__lng_forms() as $form=>$name )
			$r .= '<option value="'.$form.'" ' . ( $form === $selected ? 'selected' : '' ) . '>'.$name.'</option>';
		$r .= '</select>';
		return $r;
	}

}