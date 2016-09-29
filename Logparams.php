<?php
/*
Template Name: Logparams
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<form action="Logparamsoutput.php" onChange="jsFunction1()" method="get">
Komplettanalyse Log: <input type="text" name="log"><br>
<input type="submit">
</form>
<hr>
<form action="distributor.php" method="get">
Schnellanalyse Log: <input type="text" name="log"><br>
Boss:   <select name="boss" id="selectOpt1">
		  <option value="0" selected="selected">Boss wählen</option>
          <option value="Nythendra">Nythendra</option>
          <option value="Ilgynoth">Il'gynoth</option>
		  <option value="Elerethe">Elerethe</option>
		  <option value="Ursoc">Ursoc</option>
		  <option value="Dragons of Nightmare">Dragons of Nightmare</option>
		  <option value="Cenarius">Cenarius</option>
		  <option value="Xavius">Xavius</option>
        </select><br>
<input type="submit">
</form>
</body>
</html>