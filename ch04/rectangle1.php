<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Rectangle</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<?php # Script 4.4 - rectangle1.php
		/*
		 * This page uses the Rectangleclass.
		 * This page shows a bunch of information about a rectangle.
		 */

			// Include the class definition:
			require_once 'rectangle.class.php';

			// Define the necessary variables:
			$width = 35;
			$height = 35;

			// Print a little introduction:
			echo "<h2>With a width of $width and a height of $height...</h2>";

			// Create a new object:
			$r = new Rectangle;

			// Assign the rectangle dimensions:
			$r->setSize($width, $height);

			// Print the area and perimeter:
			echo '<p>The area of the rectangle is ' . $r->getArea() . '</p>';
			echo '<p>The perimeter of the rectangle is ' . $r->getPerimeter() . '</p>';

			// Is this a square?
			echo '<p>This rectangle is ';
			if($r->isSquare())
				echo 'also';
			else
				echo 'not';
			echo ' a square.</p>';

			// Delete the object:
			unset($r);
		?>
	</body>
</html>