<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PHP pretty print demo</title>
</head>
<body>
	<?php
	
		include "PP.php";
	
		$testsArr = array(
			array(
				"justTrue"      => true,
				"foo"			=> "bar",
				"nestedArray"   => array(
					'key1' => 1, 1.59, 2, 3, "132456", "more" => array(7, 8, 9, "1010101", [11, 222, 3333, 55.5, 3, 78, 5, 2, 6, 7])
				),
				"mongoId"       => new DateTime(),
				5				=> null,
				"f"             => false,
				"PHP Version"   => phpversion(),
				"рус"           => "по русски",
				"long string"   => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
				123456
			),
			3,
			"some string", "строка",
			true, false,
			null,
			[1, 2, 3],
			[]
		);
		
		echo "<h2>Dump example, code:<br>pp::dump(123, \"string\", [1, 2, 5 => [\"q\", \"w\", \"r\", \"t\", \"y\"]]);</h2>";
		$arr = [1, 2, 5 => ["q", "w", "r", "t", "y"]];
		PP::dump(123, "string", $arr);

		echo "<br>";
		echo "<br>";

		echo "<h2>Other examples, code:<br>PP::one(\$demoVar, \$comment)</h2>";
			
		foreach ($testsArr as $i => $t) {
			$testNumber = $i+1;
	
			echo "<br>";
			$comment = "Demo #".$testNumber."<br>";
			echo PP::one($t, $comment);
			echo "<br><br>";
		}

	?>
</body>
</html>


