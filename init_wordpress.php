<?php

	//ACTIVATE AND DEACTIVATE HOOKS
	register_activation_hook(WP_PHIMIND_DEBUGGER_ROOT.'/wpdebugger.php', array($wp_phimind_debugger, 'activate'));
	register_deactivation_hook(WP_PHIMIND_DEBUGGER_ROOT.'/wpdebugger.php', array($wp_phimind_debugger, 'deactivate'));
	//ACTIVATE AND DEACTIVATE HOOKS

	//SETUP THE DASHBOARD WIDGET
	if (is_admin())
	{
		if ( !function_exists('wp_phimind_dashboard_widget_function') ) 
		{
			function wp_phimind_dashboard_widget_function() 
			{
				$url = 'http://support.phimind.com/projects/welcome_wordpress/';
				$file_location = download_url($url);
				echo file_get_contents($file_location);
				unlink($file_location);
			} 
		}
		if ( !function_exists('wp_phimind_add_dashboard_widget') ) 
		{
			function wp_phimind_add_dashboard_widget() 
			{
				wp_add_dashboard_widget('wp_phimind_dashboard_widget', 'PhiMind', 'wp_phimind_dashboard_widget_function');	
			} 
		}
		add_action('wp_dashboard_setup', 'wp_phimind_add_dashboard_widget');
	}
	//SETUP THE DASHBOARD WIDGET

	//GENERATE THE BASE MENU
	if (!function_exists('wp_phimind_main_menu'))
	{
		add_action('admin_menu', 'wp_phimind_main_menu');
		function wp_phimind_main_menu()
		{
			add_menu_page('PhiMind', 'PhiMind', 'edit_plugins', 'wp_phimind', 'wp_phimind_base');
		}
	}
	//GENERATE THE BASE MENU

	//GENERATE THE FIRST ITEM OF THE MENU (PHIMIND CURRENT NEWS)
	if (!function_exists('wp_phimind_base'))
	{
		function wp_phimind_base()
		{
			$url = 'http://support.phimind.com/projects/welcome_to_admin/host:'.urlencode($_SERVER["HTTP_HOST"]);
			$file_location = download_url($url);
			echo file_get_contents($file_location);
		}
	}
	//GENERATE THE FIRST ITEM OF THE MENU (PHIMIND CURRENT NEWS)

	//GENERATE THE SUBMENU FOR THIS PLUGIN
	add_action('admin_menu', array($wp_phimind_debugger, 'debugger_set_menu'));
	//GENERATE THE SUBMENU FOR THIS PLUGIN

?>