<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function towy_action_theme_fw_ext_forms_include_custom_builder_items() {
	require_once dirname(__FILE__) .'/includes/builder-items/date-time/class-fw-option-type-form-builder-item-date-time.php';
}
add_action('fw_option_type_form_builder_init', 'towy_action_theme_fw_ext_forms_include_custom_builder_items');