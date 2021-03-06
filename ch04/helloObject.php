<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Hello, world!</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<?php # Script 4.2 - helloObject.php
		/*
		 * This page uses the HelloWorld class.
		 * This page just says "Hello, world!".
		 */

		// Include the class definition:
		require_once 'HelloWorld.class.php';

		// Create the object:
		$obj = new HelloWorld();

		// Call the sayHello() method:
		$obj->sayHello();

		// Say hello in different languages:
		$obj->sayHello('Italian');
		$obj->sayHello('Dutch');
		$obj->sayHello('German');

		// Delete the object:
		unset($obj);
	?>
</body>
</html>