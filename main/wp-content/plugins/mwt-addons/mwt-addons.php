<?php
/*
Plugin Name: Modern Web Templates theme addons
Description: Additional functions for mwtemplates theme
Version:     1.1
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/

if ( ! function_exists( 'mwt_login_form' ) ) :

	function mwt_login_form() {
		$redirect_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$html         = '';
		if ( ! is_user_logged_in() ) {
			$html = '
			<form name="loginform" id="login-dropdown-loginform" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
				<div class="form-group">
					<label for="login-dropdown-user_login">' . esc_html__( 'Username', 'towy' ) . '</label>
					<input type="text" name="log" id="login-dropdown-user_login" class="form-control" value="" placeholder="' . esc_html__( 'Login', 'towy' ) . '">
				</div>
				<div class="form-group">
					<label for="login-dropdown-user_pass">' . esc_html__( 'Password', 'towy' ) . '</label>
					<input type="password" name="pwd" id="login-dropdown-user_pass" class="form-control" value="" placeholder="' . esc_html__( 'Password', 'towy' ) . '">
				</div>
				<div class="checkbox">
					<label>
						<input name="rememberme" type="checkbox" id="login-dropdown-rememberme" value="forever"> ' . esc_html__( 'Remember Me', 'towy' ) . '
					 </label>
				</div>
				<input type="submit" name="wp-submit" id="login-dropdown-wp-submit" class="theme_button color1" value="' . esc_html__( 'Log In', 'towy' ) . '" />';

			if ( get_option( 'users_can_register' ) ) {
				$html .= ' <a href="' . esc_url( wp_registration_url() ) . '" class="theme_button color2">' . esc_html__( 'Register', 'towy' ) . '</a>';
			}

			$html .= '<input type="hidden" name="redirect_to" value="' . esc_url( $redirect_url ) . '" />
			</form>';
			$html .= '<a href="' . esc_url( wp_lostpassword_url( $redirect_url ) ) . '">' . esc_html__( 'Forgot Your Password?', 'towy' ) . '</a>';
		} else {
			$html = '<a href="' . esc_url( wp_logout_url( $redirect_url ) ) . '" class="theme_button color1">' . esc_html__( 'Log out', 'towy' ) . '</a>';
			if ( current_user_can( 'read' ) ) {
				$html .= ' <a href="' . admin_url() . '" class="theme_button color2">' . esc_html__( 'Site Admin', 'towy' ) . '</a>';
			}
		}
		echo $html;
	} //mwt_login_form()

endif;


//adding user social contacts
if ( ! function_exists( 'mwt_filter_modify_user_contact_methods' ) ):
	function mwt_filter_modify_user_contact_methods( $profile_fields ) {

		// Add new fields
		$profile_fields['twitter']     = esc_html__( 'Twitter URL', 'towy' );
		$profile_fields['facebook']    = esc_html__( 'Facebook URL', 'towy' );
		$profile_fields['google_plus'] = esc_html__( 'Google+ URL', 'towy' );

		return $profile_fields;

	}
endif; //function_exists
add_filter( 'user_contactmethods', 'mwt_filter_modify_user_contact_methods' );