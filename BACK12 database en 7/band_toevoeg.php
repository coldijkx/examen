<!DOCTYPE html>
<html>

   <head>
      <title>Form</title>
   </head>
	
   <body>
    <form action="band_toevoeg_verwerk.php" method="post">
        <p>Bandnaam: <input type="text" name="Bandnaam" /></p>
        <p>Land van herkomst: <input type="text" name="Land van herkomst" /></p>
        <p>Aantal leden: <input type="text" name="Aantal leden" /></p>
        <p>Soort muziek <input type="text" name="Soort muziek" /></p>
        Description : <br />
        <textarea rows = "5" cols = "30" name = "description">
        </textarea>
        <p><input type="submit" /></p>
       </form>
   </body>
	
</html>