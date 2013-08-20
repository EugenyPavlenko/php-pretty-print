<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PHP pretty print demo</title>
</head>
<body>
	<?php
	
		include "pp.php";
	
		$testsArr = array(
			array(
				"1"				=> "PHP code tester Sandbox Online",
				"justTrue"      => true,
				"foo"			=> "bar",
				5,
				"nestedArray"   => array(
					'key1' => 1, 1.59, 2, 3, "132456", "more" => array(7, 8, 9, "1010101", [11, 222, 3333, 2, 3, 78, 5, 55.5, 6, 7])
				),
				"mongoId"       => new DateTime(),
				5				=> null,
				"case"			=> "Random Stuff",
				"f"             => false,
				"PHP Version"   => phpversion(),
				"long string"   => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
				123456
			),
			3,
			"some string",
			true, false,
			null
		);
	
		foreach ($testsArr as $i => $t) {
			$testNumber = $i+1;
	
			echo "<br>";
			$comment = "Demo #".$testNumber."<br>";
			echo $comment;
			echo PP::do_($t);
			echo "<br><hr>";
		}
	
	?>
</body>
</html>


