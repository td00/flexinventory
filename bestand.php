<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>

<div class="container main-container">

<h1>Optiken Bestand:</h1>

Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
Folgende Optiken haben wir aktuell im Bestand:<br><br>

<div class="panel panel-default">
 
<table class="table">
<tr>
	<th>#</th>
	<th>ProdNr</th>
	<th>Stück</th>
    <th>Tray-ID</th>
	<th>Typ</th>
    <th>Range (in m)</th>
    <th>RX (in dbM)</th>
    <th>TX (in dbM)</th>
    <th>Industr.</th>
    <th>S/M</th>
    <th>Steckertyp</th>
    <th>Kommentar</th>
    <th>Produktseite</th>

</tr>
<?php 
$statement = $pdo->prepare("SELECT * FROM inventory ORDER BY id");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['flexuuid']."</td>";
	echo "<td>".$row['anzahl']."</td>";
    echo "<td>".$row['tray_ids']."</td>";
    echo "<td>".$row['typ']."</td>";
    echo "<td>".$row['range']."</td>";
    echo "<td>".$row['rx']."</td>";
    echo "<td>".$row['tx']."</td>";
    echo "<td>".$row['industrial']."</td>";
    echo "<td>".$row['singlemulti']."</td>";
    echo "<td>".$row['steckertyp']."</td>";
    echo "<td>".$row['kommentar']."</td>";
	echo '<td><a href="'.$row['zusatz'].'">'.$row['zusatz'].'</a></td>';
	echo "</tr>";
}
?>
</table>
</div>


</div>
<?php 
include("templates/footer.inc.php")
?>
