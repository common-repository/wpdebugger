<?php 

	//CONFIGURE ALL WORDPRESS VARIABLES AND FUNCTIONS HERE (NOT NEEDED FOR THE FRONTEND)
	require_once(WP_PHIMIND_DEBUGGER_ROOT.'/init_wordpress.php');

	//AJAX GENERIC CALL
	add_action('wp_ajax_wp_phimind_debugger_ajax_call', 'wp_phimind_debugger_ajax_call');
	function wp_phimind_debugger_ajax_call()
	{
		$method = $_REQUEST["method"];
		$wp_phimind_debugger = new wp_phimind_debugger();
		call_user_func(array($wp_phimind_debugger, $method));
	}

	//SIMPLE REQUEST HANDLER
	if (@$_REQUEST["method"] != '' && @$_REQUEST["page"] == "wpdebugger")
	{
		call_user_method($_REQUEST["method"], $wp_phimind_debugger);
	}

	//CHECKS TO SEE IF THIS IS THE ACTIVATE/DEACTIVE ACTION IN THE PLUGIN 
	if (get_option('wp_phimind_debugger_show_in_admin') == 1)
	{
		//SET THE ACTION FOR THE FOOTER
		add_action('shutdown', array($wp_phimind_debugger, 'debugger_footer'));
	}

?>