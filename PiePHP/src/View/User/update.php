<form action="update" method="POST">
<label>Votre email :</label>
<input type="text" name="editemail" placeholder="Pseudo" value ="<?php session_start();  echo $_SESSION['email'];?>">
<input type="submit" value="submit">
</form>