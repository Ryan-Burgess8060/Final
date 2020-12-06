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
		<label for="x1">x1</label><br>
		<input type="text" id="x1" name="x1"><br>
		<label for="y1">y1</label><br>
		<input type="text" id="y1" name="y1"><br>
		<label for="x2">x2</label><br>
		<input type="text" id="x2" name="x2"><br>
		<label for="y2">y2</label><br>
		<input type="text" id="y2" name="y2"><br>
		<button onclick="return calc();">Submit</button>
		<p id="answer"></p>
	<script>
		function calc() {
			console.log("hi");
			let xval = document.getElementById('x').value;
			let yval = document.getElementById('y').value;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadstatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(document.getElementById('answer'));
					document.getElementById('answer').innerHTML = "The answer is " + this.responseText;
				}
			};
			xhttp.open("POST", 'https://us-east1-capable-arbor-286903.cloudfunctions.net/function-final', true);
			xhttp.setRequestHeader("Content-type", "application/json");
			xhttp.send(JSON.stringify({x:xval, y:yval}));
			console.log("bye");
		}
	</script>
</body>