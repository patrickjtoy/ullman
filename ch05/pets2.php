<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Pets</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php # Script 5.3 - pets2.php
			// This page defines and uses the Pet, Cat, and Dog classes.

			# ***** CLASSES ***** #

			/* Class Pet.
			 * The class contains one attribute: name.
			 * The class contains three methods:
			 * - __construct()
			 * - eat()
			 * - sleep()
			 */
			class Pet {

				// Declare the attributes:
				public $name;

				// Constructor assigns the pet's name:
				function __construct($pet_name) {
					$this->name = $pet_name;
				}

				// Pets can eat:
				function eat() {
					echo "<p>{$this->name} is eating.</p>";
				}

				// Pets can sleep:
				function sleep() {
					echo "<p>{$this->name} is sleeping.</p>";
				}

				// Pets can play:
				function play() {
					echo "<p>{$this->name} is playing.</p>";
				}
			} // End of Pet class.

			/* Cat class extends Pet.
			 * Cat overrides play().
			 */
			class Cat extends Pet {
				function play() {
					echo "<p>{$this->name} is climbing.</p>";
				}
			} // End of Cat class

			/* Dog class extends Pet.
			 * Dog overrides play().
			 */
			class Dog extends Pet {
				function play() {
					echo "<p>{$this->name} is fetching.</p>";
				}
			} // End of Dog class.

			# ***** END OF CLASSES ***** #

			// Create a dog:
			$dog = new Dog('Satchel');

			// Create a cat:
			$cat = new Cat('Bucky');

			// Create an unknown type of pet:
			$pet = new Pet('Bob');

			// Feed them:
			$dog->eat();
			$cat->eat();
			$pet->eat();

			// Nap time:
			$dog->sleep();
			$cat->sleep();
			$pet->sleep();

			// Do animal-specific thing:
			$dog->play();
			$cat->play();
			$pet->play();

			// Delete the objects:
			unset($dog, $cat, $play);

		?>
	</body>
</html>