<?php 

	//DEFINE GLOBAL VARIABLES
	define('WP_PHIMIND_DEBUGGER_ROOT' , WP_PLUGIN_DIR.'/wpdebugger');
	define('WP_PHIMIND_DEBUGGER_ROOT_WEB' , WP_PLUGIN_URL.'/wpdebugger');
	define('WP_PHIMIND_DEBUGGER_VERSION', '0.2');

	//GET ALL THE CLASSES NEEDED
	include_once(WP_PHIMIND_DEBUGGER_ROOT.'/controllers/class.wp_phimind_debugger_helpers.php');
	require_once(WP_PHIMIND_DEBUGGER_ROOT.'/controllers/class.wp_phimind_debugger_controller_extension.php');
	require_once(WP_PHIMIND_DEBUGGER_ROOT.'/controllers/class.wp_phimind_debugger.php');

	//INSTANTIATE THE BASE CLASS
	global $wp_phimind_debugger;
	$wp_phimind_debugger = new wp_phimind_debugger();

	//CHECKS TO SEE IF IT WILL USE THE FRONTEND OR ADMIN INCLUDES
	if (is_admin())
		require_once('init_admin.php');
	else
		require_once('init_frontend.php');
?>