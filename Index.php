<!DOCTYPE html>
<html lang="en-US">
<!-- #Ryan Burgess
#11/28/2020
#Index.php -->
<head>
	<title>Burgess Final Project</title>
	<meta charset="utf-8"/>
	<!--<link href="style.css" rel="stylesheet"/>-->
</head>
<body>
	<p>Please input 2 points for corners of a square.</p>
	<form method="post">
		<label for="x1">x1</label><br>
		<input type="text" id="x1" name="x1"><br>
		<label for="y1">y1</label><br>
		<input type="text" id="y1" name="y1">
		<label for="x2">x2</label><br>
		<input type="text" id="x2" name="x2"><br>
		<label for="y2">y2</label><br>
		<input type="text" id="y2" name="y2">
		<input type="submit" name="submit" value="submit" />
		<?php
		if(isset($_POST['submit'])) {
			$postRequest = array(
				'x1' => $_POST['x1'],
				'y1' => $_POST['y1'],
				'x2' => $_POST['x2'],
				'y2' => $_POST['y2']
			);

			$cURLConnection = curl_init('https://us-east1-capable-arbor-286903.cloudfunctions.net/function-final');
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			$apiResponse = curl_exec($cURLConnection);
			curl_close($cURLConnection);
			echo $apiResponse;
		}
		?>
	</form>
</body>