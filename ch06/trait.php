<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Trait</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php # Script 6.7 - trait.php

			// This page uses the Debug trait through the Rectangle object.

			// Include the trait definition:
			require_once 'trait/trait.debug.php';

			// Include the class definition:
			require_once '../ch04/class.rectangle.php';

			// Create a new object:
			$r = new Rectangle(42, 37);

			// Dump the information:
			$r->dumpObject();

			// Delete the object:
			unset($r);

		?>
	</body>
</html>