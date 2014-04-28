<?php # Script 2.6 - search.inc.php

/*
 * This is the search content module.
 * This page is included by index.php.
 * This page expects to receive $_GET['terms'].
 */

// Redirect if this page was accessed directly:
if(!defined('BASE_URL')) {
	// Need the BASE_URL, defined in the config file:
	require '../includes/config.inc.php';

	// Redirect to the index page:
	$url = BASE_URL . '/ch02/search';
	header("Location: $url");
	exit;
} // End of defined() IF.

// Print a caption:
echo '<h1>Search Results</h1>';

// Display the search results if the form has been submitted
if(isset($_POST['terms']) && ($_POST['terms'] != 'Search...')) {
	// Query the database.
	// Fetch the results.
	// Print the results.
	for($i = 1; $i <= 10; $i++) {
		echo <<<EOT
<h4><a href="/ch02/">Search Result #$i</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, itaque quidem expedita quas ipsam illo totam dicta voluptatem. Odio delectus veritatis natus nobis deleniti magni fuga quod quos modi similique.</p>\n
EOT;
	}
} else { // Tell them to use the search form.
	echo '<p class="error">Please use the search form to search this site.</p>';
}