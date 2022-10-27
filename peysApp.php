<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>

    <?php 

		$imgSize = 30;

	 	if(isset($_GET['btnProcess'])){ 
	 		$imgSize = $_GET['imgSize'];
	 		$color = $_GET['borderColor'];	
	 	}
	 ?>

	<form method="get">
		<label for="txtVolume">Select Photo Size:</label>
		<input type="range" name="imgSize" id="imgSize" value="60%" min="0" max="100" step="10"><br>
	
		<label for="borderColor">Select Border Color:</label>
		<input type="color" name="borderColor" value="black" ><br>


		<input type="submit" name="btnProcess" value="Process">

	<hr>
		
	<img img src="myPhoto.jpg" style="width: <?php echo $imgSize . '%'; ?>;border-color: <?php echo $color; ?>;border-width: 3px; border-style: solid;">
	</form>
</body>
</html>

