<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/header.inc.php")
?>
<div class="container main-container registration-form">
<h1>Neue Optik Anlegen</h1>
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
	$flexuuid = $_POST['flexuuid'];
	$anzahl = $_POST['anzahl'];
	$typ = $_POST['typ'];
	$rx = $_POST['rx'];
	$tx = $_POST['tx'];
    $tray_ids = $_POST['tray_ids'];
    $range = $_POST['range'];
    $industrial = $_POST['industrial'];
    $singlemulti = $_POST['singlemulti'];
    $steckertyp = $_POST['steckertyp'];
    $bezeichnung = $_POST['bezeichnung'];
    $zusatz = $_POST['zusatz'];
    $kommentar = $_POST['kommentar'];
    $soll_min_anzahl = $_POST['soll_min_anzahl'];
	
	if(empty($flexuuid) || empty($anzahl) || empty($typ)) {
		echo 'Bitte alle Felder ausfüllen<br>';
		$error = true;
	}
  

	//Überprüfe, dass die UUID noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM inventory WHERE flexuuid = :flexuuid");
		$result = $statement->execute(array('flexuuid' => $flexuuid));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Diese UUID ist bereits angelegt<br>';
			$error = true;
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {	
				
		$statement = $pdo->prepare("INSERT INTO inventory (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));
		
		if($result) {		
			echo 'Optik in Bestand erfolgreich angelegt.';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	} 
}
 
if($showFormular) {
?>

<form action="?register=1" method="post">

<div class="form-group">
<label for="inputFlexUUID">Flexoptix Produkt ID:</label>
<input type="text" id="inputFlexUUID" size="40" maxlength="250" name="flexuuid" class="form-control" required>
</div>

<div class="form-group">
<label for="inputAnzahl">Stück:</label>
<input type="text" id="inputAnzahl" size="40" maxlength="3" name="anzahl" class="form-control" required>
</div>

<div class="form-group">
<label for="inputEmail">E-Mail:</label>
<input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control" required>
</div>

<div class="form-group">
<label for="inputPasswort">Dein Passwort:</label>
<input type="password" id="inputPasswort" size="40"  maxlength="250" name="passwort" class="form-control" required>
</div> 

<div class="form-group">
<label for="inputPasswort2">Passwort wiederholen:</label>
<input type="password" id="inputPasswort2" size="40" maxlength="250" name="passwort2" class="form-control" required>
</div> 
<button type="submit" class="btn btn-lg btn-primary btn-block">Registrieren</button>
</form>
 
<?php
} //Ende von if($showFormular)
	

?>
</div>
<?php 
include("templates/footer.inc.php")
?>