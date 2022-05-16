<?php
require 'Config.php';

$userid = $_GET['id'];

$query = "SELECT * FROM back13_albums WHERE ID_album =" . $userid;

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er is geen user met ID $userid.</p>";
}
else
{
	$rij = mysqli_fetch_array($resultaat);
?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Album aanpassen</h1>
	<form name="form1" method="post" action="album_pasaan_verwerk.php">
	<table width="200" border="0">
		<tr>
			<td>ID:</td>
			<td><input type="number" name="ID_album" value="<?php echo $rij['ID_album'] ?>" readonly></td>
		</tr>
		<tr>
			<td>Titel:</td>
			<td><input type="text" name="Titel" value="<?php echo $rij['Titel'] ?>"></td>
		</tr>
			<tr>
			<td>Band:</td>
			<td><select name="Band"><?php
		   require ('Config.php');
		   $opdracht = "SELECT * FROM back12_bands";
		   $resultaat = mysqli_query($mysqli, $opdracht);
		   while ($Band = mysqli_fetch_array($resultaat))
		   {
		   		echo"<option value='" . $Band['ID_band'] . "'>";
		   			echo $Band['Naam'];
		   			echo "</option>";
		   }
		   ?></select></td>
		</tr>
		<tr>
			<td>Jaar:</td>
			<td><input type="text" name="Jaar" value="<?php echo $rij['Jaar'] ?>"></td>
		</tr>
		<tr>
			<td>Info:</td>
			<td><input  name="Info" value="<?php echo $rij['Info'] ?>"></input></td>
		</tr>
		<tr>
			<td>Afbeelding:</td>
			<td><input name="Afbeelding" value="<?php echo $rij['Afbeelding'] ?>"></input></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="submit" value="Opslaan"></td>
		</tr>
	</table>
	<a href="album_toon.php">Terug</a>
</form>
</body>
</html>
<?php
}
?>