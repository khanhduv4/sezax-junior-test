<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Poker Junior Test</title>
</head>

<body>
	<div style="width: 500px; margin: 0 auto;">
		<h1 style="width: 500px; text-align: center">POKER HAND CHECKER</h1>
		<form method="post">
			<label for="strPoker">Poker string: </label>
			<input type="text" name="strPoker">
			<button type="submit">Check</button>
		</form>

		<p>
			<?php
			$strPoker = isset($_POST['strPoker']) ? (string) trim($_POST['strPoker']) : null;

			if (!preg_match('/^([SHDC]{1}([2-9AJQK]|10)){5}$/', $strPoker)) {
				echo "Please enter the valid poker string.", "<br>";
				echo "For Example: S8D3HQS3CQ", "<br>";
			} else {
				echo "Input string: ", $strPoker, "<br>";
				$strRank = preg_replace("/[SHDC]/", "", $strPoker);
				$result = 0;
				for ($i = 0; $i < strlen($strRank); $i++) {
					if ($strRank[$i] == "0") {
						continue;
					}
					$result += substr_count($strRank, $strRank[$i]);
				}
				echo "Output: ";

				switch ($result) {
					case 5: {
							echo "--";
							break;
						}
					case 7: {
							echo "1P";
							break;
						}
					case 9: {
							echo "2P";
							break;
						}
					case 11: {
							echo "3C";
							break;
						}
					case 13: {
							echo "FH";
							break;
						}
					case 17: {
							echo "4C";
							break;
						}
					default: {
							echo "Something wrong with the poker string ", $strPoker;
							break;
						}
				}
			}
			?>

		</p>
	</div>


</body>

</html>