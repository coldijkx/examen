<?php
if (isset($_POST['submit'])){	
		require 'Config.php';

		$Titel 		= $_POST['Titel'];
		$Band 		= $_POST['Band'];
		$Jaar		= $_POST['Jaar'];
		$Info		= $_POST['Info'];
		$Afbeelding = $_FILES['Afbeelding'];
		$Afbeelding = $Afbeelding['name'];	
		$query = "INSERT INTO back13_albums
 		VALUES (NULL,  '$Titel', '$Band', '$Jaar', '$Info', '$Afbeelding')";
		if (mysqli_query($mysqli, $query)) 
		{
			echo "$Titel is toegevoegd.<br/>";
			$Afbeelding = $_FILES['Afbeelding'];
			$tijdelijk	= $Afbeelding['tmp_name'];
			$naam 		= $Afbeelding['name'];
			$betstandtype = $Afbeelding['type'];
			$map    	= "albums/";

			$toegestaan = array("image/jpeg", "image/gif", "image/png");
			if (in_array($betstandtype, $toegestaan))
					 {
					echo "Verplaats ". $tijdelijk . " naar " . $map.$naam . "...<br/>";

					if (move_uploaded_file($tijdelijk, $map.$naam))
					{
						echo "Gelukt<br/>";
					}
					else
					{
					echo "Fout!.<br/>";
					}
				}else
			{
				echo "Dit bestandtype ($bestandtype) kan niet worden toegevoegd<br/>";
			}
		}			
}else
		{
		echo "$Titel is niet toegevoegd";
		}	
		echo "<p><a href='album_toon.php'>Terug</a></p>";
?>