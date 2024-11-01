
	<form name="frm" method="post" action="<?php echo admin_url('admin.php?page=wpdebugger&method=debugger_update_configuration')?>">
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_show_in_admin', array('type' => 'checkbox', 'label' => 'Show Admin', 'checked' => get_option('wp_phimind_debugger_show_in_admin'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_show_in_frontend', array('type' => 'checkbox', 'label' => 'Show Frontend', 'checked' => get_option('wp_phimind_debugger_show_in_frontend'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_database_queries', array('type' => 'checkbox', 'label' => 'Show Database Queries (default $wpdb object)', 'checked' => get_option('wp_phimind_debugger_database_queries'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_database_queries_aditional_objects', array('type' => 'checkbox', 'label' => 'Show Additional database objects', 'checked' => get_option('wp_phimind_debugger_database_queries_aditional_objects'), 'value' => 1));?> <?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_database_queries_aditional_objects_names', array('type' => 'text', 'label' => '', 'value' => get_option('wp_phimind_debugger_database_queries_aditional_objects_names')));?> ( multiple = comma-separated )</span>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_rewrite_rules', array('type' => 'checkbox', 'label' => 'Show Rewrite Rules', 'checked' => get_option('wp_phimind_debugger_rewrite_rules'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_get_variables', array('type' => 'checkbox', 'label' => '$_GET variables', 'checked' => get_option('wp_phimind_debugger_get_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_post_variables', array('type' => 'checkbox', 'label' => '$_POST variables', 'checked' => get_option('wp_phimind_debugger_post_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_cookies_variables', array('type' => 'checkbox', 'label' => '$_COOKIES variables', 'checked' => get_option('wp_phimind_debugger_cookies_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_request_variables', array('type' => 'checkbox', 'label' => '$_REQUEST variables', 'checked' => get_option('wp_phimind_debugger_request_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_server_variables', array('type' => 'checkbox', 'label' => '$_SERVER variables', 'checked' => get_option('wp_phimind_debugger_server_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_env_variables', array('type' => 'checkbox', 'label' => '$_ENV variables', 'checked' => get_option('wp_phimind_debugger_env_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_files_variables', array('type' => 'checkbox', 'label' => '$_FILES variables', 'checked' => get_option('wp_phimind_debugger_files_variables'), 'value' => 1));?>
		<br>
		<?php echo wp_phimind_debugger_helpers::form_input('wp_phimind_debugger_globals_variables', array('type' => 'checkbox', 'label' => '$_GLOBAL variables (not advised - very big response)', 'checked' => get_option('wp_phimind_debugger_globals_variables'), 'value' => 1));?>
		<br>
		<br>
		<input type="submit" value="update">
	</form>
