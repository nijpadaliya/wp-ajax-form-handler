<?php
/**
 * Plugin Name: WP AJAX Form Handler
 * Description: Simple AJAX form example using WordPress.
 */

defined('ABSPATH') || exit;

// Load JS
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_script(
		'ajax-form',
		plugin_dir_url(__FILE__) . 'form.js',
		['jquery'],
		null,
		true
	);

	wp_localize_script('ajax-form', 'ajaxData', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce'    => wp_create_nonce('ajax_form_nonce')
	]);
});

// AJAX hooks
add_action('wp_ajax_submit_form', 'handle_ajax_form');
add_action('wp_ajax_nopriv_submit_form', 'handle_ajax_form');

function handle_ajax_form() {

	check_ajax_referer('ajax_form_nonce', 'nonce');

	$name  = sanitize_text_field($_POST['name'] ?? '');
	$email = sanitize_email($_POST['email'] ?? '');

	if (empty($name) || empty($email)) {
		wp_send_json_error('All fields are required');
	}

	wp_send_json_success([
		'message' => 'Form submitted successfully'
	]);
}
