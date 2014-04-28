<?php # Script 2.1 - config.inc.php
	/*
	 * File name: config.inc.php
	 * Created by: Patrick J. Toy
	 * Contact: patrickjtoy@gmail.com
	 * Last modified: March 3, 2014
	 * Configuration ifle does the following things:
	 * - Has site settings in one location.
	 * - Stores URLs and URIs as constants.
	 * - Sets how errors will be handled.
	 */

	# ************************ #
	# ******* SETTINGS ******* #

	// Errors are emailed here:
	$contactEmail = 'patrick@localhost';

	// Determine whether we're working on a local server or on the real server:
	$host = substr($_SERVER['HTTP_HOST'], 0, 5);
	if(in_array($host, array('local', '127.0', '192.1')))
		$local = true;
	else
		$local = false;

	// Determine location of files and the URL of the site:
	// Allow for development on different servers.
	if($local) {
		// Always debug when running locally:
		$debug = true;
		// Define the constants:
		define('BASE_URI', './');
		define('BASE_URL', 'http://localhost/ch02/');
		define('DB', './includes/mysql.inc.php');
	} else {
		define('BASE_URI', '/path/to/live/html/folder');
		define('BASE_URL', 'http://www.example.com/');
		define('DB', '/path/to/live/mysql.inc.php');
	}

	/*
	 * Most important setting!
	 * The $debug variable is used to set error management.
	 * To debug a specific page, add this to the index.php page:

	if($p == 'thismodule') $debug = true;
	require './includes/config.inc.php';

	 * To debug the entire site, do

	$debug = true;

	 * before this next conditional.
	 */

	// Assume debugging is off.
	if(!isset($debug))
		$debug = false;

	# ******* SETTINGS ******* #
	# ************************ #

	# ************************ #
	# *** ERROR MANAGEMENT *** #

	// Create the error handler:
	function myErrorHandler($eNumber, $eMessage, $eFile, $eLine, $eVars) {
		global $debug, $contactEmail;

		// Build the error message:
		$message = "An error occurred in script '$eFile' on line $eLine: $eMessage";

		// Append $eVars to the $message:
		$message .= print_r($eVars, 1);

		if($debug) { // Show the error.
			echo '<div class="error">' . $message . '</div>';
			debug_print_backtrace();
		} else {
			// Log the error:
			error_log($message, 1, $contactEmail); // Send email.

			// Only print an error message if the error isn't a notice or strict.
			if(($eNumber != E_NOTICE) && ($eNumber < 2048)) {
				echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
			}
		} // End of $debug IF.
	} // End of myErrorHandler() definition.

	// Use my error handler:
	set_error_handler('myErrorHandler');

	# *** ERROR MANAGEMENT *** #
	# ************************ #
