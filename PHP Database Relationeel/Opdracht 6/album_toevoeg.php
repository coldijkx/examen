<!DOCTYPE html>
<html>
<head>
	<title>Toevoeg</title>
</head>
<body>
<form method="post" action="album_toevoeg_verwerk.php" enctype="multipart/form-data">
<table border="0">
	<tr>
		<td>Titel:</td>
		<td><input type="text" name="Titel" ></td>
	</tr>
	<tr>
		<td>Band:</td>
		<td><select name="Band">
		   <?php
		   require ('Config.php');
		   $opdracht = "SELECT * FROM back12_bands";
		   $resultaat = mysqli_query($mysqli, $opdracht);
		   while ($Band = mysqli_fetch_array($resultaat))
		   {
		   		echo"<option value='" . $Band['ID_band'] . "'>";
		   			echo $Band['Naam'];
		   			echo "</option>";
		   }
		   ?>
 		</select></td>
	</tr>
	<tr>
		<td>ReleaseDate:</td>
		<td><input type="date" name="ReleaseDate"></td>
	</tr>
	<tr>
		<td>Info:</td>
		<td><input type="text" name="Info"></td>
	</tr>
	<tr>
		<td>Afbeelding:</td>
		<td><input type="file" name="Afbeelding"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="submit"></td>
	</tr>
</table>
</form>
</body>
</html>


