<?php # Script 6.5 - trait.debug.php

	// This page defines the Debug trait

	/* The Debug trait.
	 * The trait defines one method: dumpObject():
	 */
	trait Debug {

		// Method dumps out a lot of data about the current object:
		public function dumpObject() {

			// Get the class name:
			$class = get_class($this);

			// Get the attributes:
			$attributes = get_object_vars($this);

			// Get the methods:
			$methods = get_class_methods($this);

			// Print a heading:
			echo "<h2>Information about the $class object</h2>";

			// Print the attributes:
			echo '<h3>Attributes</h3><ul>';
			foreach ($attributes as $key => $value) {
				echo "<li>$key: $value</li>";
			}
			echo '</li></ul>';

			// Print the methods:
			echo '<h3>Methods</h3><ul>';
			foreach ($methods as $value) {
				echo "<li>$value</li>";
			}
			echo '</li></ul>';

		} // End of dumpObject method.

	} // End of Debug trait.