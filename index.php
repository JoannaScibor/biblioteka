<!DOCTYPE html>
<html>
<head>
<title>Biblioteka szkolna</title>
<meta charset ="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>
	Sprawdź dostępność książek!
</h1>
<div id="pojemnik">
<div id="pojemnik0">  <h3>Zakup nowości wydawniczych w 2019 r. realizowany jest ze środków finansowych Ministra Kultury i Dziedzictwa Narodowego w ramach Narodowego Programu Rozwoju Czytelnictwa</h3>
</div>
<div id="pojemnik1">
<form action="index.php" method="post">
</br></br><em>Wybierz miasto:</em></br></br>
	<select name="miasto">
	<option></option>
	<option>Kraków</option>
	<option>Szczecin</option>
	<option>Poznań</option>
	</select></br></br>
	<input type="submit" value="sprawdź">
</form>
</div>
<div id="pojemnik3">
<em><span style='color:gold;font-size:28px;'>W zbiorze biblioteki znajdziesz: </span></em>
<?php
if(isset($_POST["miasto"]))
	{
		
		if(empty($_POST["miasto"]))
		{
			echo '<span style="color:red;">Nie podano nazwy miasta!</span>';
		}
		else
		{
	require "connect.php";
	$conn= mysqli_connect($host,$user,$password,$db_name)or die ("Nie można połaczyć z bazą");
	mysqli_set_charset ($conn,"utf8");
	$miasto=$_POST['miasto'];
	$q="SELECT tytul,liczba_egzemplarzy FROM ksiazki WHERE miasto='$miasto'";
	$result=mysqli_query($conn,$q);
	while($wiersz=mysqli_fetch_row($result))
	{
	echo "</br></br></br></br></br>".$wiersz[0]."</br></br>";
	echo "Na stanie: ".$wiersz[1]." szt.</br>";
	}
	}

	mysqli_close($conn);
	}
?>
</div>
</div>
</body>

</html>
