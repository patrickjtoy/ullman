<?php # Script 3.1 - db_sessions.inc.php

/*
 * This page creates the functional interface for
 * storing session data in a database.
 * This page also starts the session.
 */

// Global variable used for the database connections in all session functions:
$sdbc = NULL;

// Define the openSession() function:
// This function takes no arguments.
// This function should open the database connection.
// This function should return true.
function openSession() {
	global $sdbc;

	// Connect to the database:
	$sdbc = new mysqli('localhost', 'root', '', 'test');

	return true;
} // End of openSession() function.

// Define the closeSession function():
// This function takes no arguments.
// This function closes the database connection.
// This function returns the closed status.
function closeSession() {
	global $sdbc;

	return $sdbc->close();
} // End of closeSession() function.

// Define the readSession() function:
// This function takes one argument: the session ID.
// This function retrieves the session data.
// This function returns the session data as a string.
function readSession($sid) {
	global $sdbc;

	// Query the database:
	$q = sprintf('SELECT data FROM sessions WHERE id="%s"', $sdbc->real_escape_string($sid));
	$r = $sdbc->query($q);

	// Retrieve the results:
	if($r->num_rows() == 1) {
		list($data) = $r->fetch_array(MYSQLI_NUM);

		// Return the data:
		return $data;
	} else // Return an empty string.
			return '';
} // End of readSession() function.

// Define the writeSession() function:
// This function takes two arguments:
// the session ID and the session data.
function writeSession($sid, $data) {
	global $sdbc;

	// Store in the database:
	$q = sprintf('REPLACE INTO sessions (id, data) VALUES ("%s", "%s")', $sdbc->real_escape_string($sid), $sdbc->real_escape_string($data));
	$r = $sdbc->query($q);

	return true;
} // End of writeSession() function.

// Define the destroySession() function:
// This function takes one argument: the session ID
function destroySession($sid) {
	global $sdbc;

	// Delete from the database:
	$q = sprintf('DELETE FROM sessions WHERE id="%s"', $sdbc->real_escape_string($sid));
	$r = $sdbc->query($q);

	// Clear the $_SESSION array:
	$_SESSION = array();

	return true;
} // End of destroySession() function.

// Define the cleanSession function:
// This function takes one argument: a value in seconds.
function cleanSession($expire) {
	global $sdbc;

	// Delete old sessions:
	$q = sprintf('DELETE FROM sessions WHERE DATE_ADD(last_accessed, INTERVAL %d SECOND) < NOW()', (int) $expire);
	$r = $sdbc->query($q);

	return true;
} // End of cleanSession() function.

# **************************** #
# ***** END OF FUNCTIONS ***** #
# **************************** #

// Declare the functions to use:
session_set_save_handler('openSession', 'closeSession', 'readSession', 'writeSession', 'destroySession', 'cleanSession');

// Make whatever other changes to the session settings, if you want.

// Start the session:
session_start();
