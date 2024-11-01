

	<br>

	<div class="wp_phimind_debugger_faq_question">Are only admin users able to see debugging information?</div>
	<div class="wp_phimind_debugger_faq_answer">Yes. For security reasons we decided it was safer to do this way. You won't have any kind of surprises when normal users access you blog.</div>

	<div class="wp_phimind_debugger_faq_question">Can't I monitor a database connection that is not extended from the wpdb class?</div>
	<div class="wp_phimind_debugger_faq_answer">No. The wpdb class is a safe and reliable way for database abstraction layer. It provides all the methods necessary for CRUD operations and also the monitoring tools needed. If you are using native PHP functions to access your database then you are doing it wrong. Abstraction layers are there for a reason. Use them.</div>

	<div class="wp_phimind_debugger_faq_question">Additional database variables are not being monitored and displayed. Why?</div>
	<div class="wp_phimind_debugger_faq_answer">Be sure to check that you have inputed only the name of the variable and not the "$" from it. Also, if you are monitoring multiple database connections then separate them with commas.</div>

	<div class="wp_phimind_debugger_faq_question">Why is showing the GLOBALS variable not advised?</div>
	<div class="wp_phimind_debugger_faq_answer">The GLOBALS variable holds a massive amount of data. In some Wordpress installations it can sum up to 1mb of data. It will slow down the page generation. Even though it's huge we left the option there since sometimes you need it to debug your application.</div>
	
