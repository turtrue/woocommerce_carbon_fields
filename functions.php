<?php
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}



// ПОДКЛЮЧЕНИЕ НАСТРОЕК ТЕМЫ
require get_template_directory() . '/includes/theme-settings.php';

// ПОДКЛЮЧЕНИЕ ОБЛАСТИ ВИДЖЕТОВ
require get_template_directory() . '/includes/widget-areas.php';

// ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ
require get_template_directory() . '/includes/enqueue-styles-scripts.php';

// ПОДКЛЮЧЕНИЕ ВСПОМОГАТЕЛЬНЫХ ФУНКЦИЙ
require get_template_directory() . '/includes/helpers.php';

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	load_template(get_template_directory() . '/includes/carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'store_register_custom_fields');
function store_register_custom_fields()
{
	require get_template_directory() . '/includes/custom-fields-options/metabox.php';
	require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
}
