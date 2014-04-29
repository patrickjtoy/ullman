<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Namespace</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php # Script 6.10 - namespace.php

			// This page defines and uses the Department and Employee classes.

			// Include the PHP script:
			require_once 'namespace/namespace.company.php';

			// Create a department:
			$hr = new \MyNamespace\Company\Department('Accounting');

			// Create employees:
			$e1 = new \MyNamespace\Company\Employee('Holden Caulfield');
			$e2 = new \MyNamespace\Company\Employee('Jane Gallagher');

			// Add the employees to the department:
			$hr->addEmployee($e1);
			$hr->addEmployee($e2);

			// Delete the objects:
			unset($hr, $e1, $e2);

		?>
	</body>
</html>