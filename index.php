<!-- 
    PROJET : Projet de traceur GPS pour vélo à hydrogène.
    AUTEUR : Letitia ALVES & Michi ODAKA (I.FA-P3A)
    DESC.: Dans le cadre d'un projet de vélo à hydrogène nommé H2-Lem, on vous charge de développer la partie logicielle qui réceptionnera en continu les traces GPS envoyées via internet par le traceur GPS du vélo. Le logiciel devra aussi permettre d'afficher sur une carte le parcours instantané de chaque vélo ainsi que des indicateurs (ex: vitesse) et proposer une interface d'administration.
    VERSION : 02.09.2020 v.1
-->

<!DOCTYPE html>

<?php
include 'config.inc/config.inc.php';

$leVelo = [];
$listeVelo = [];
?>

<html lang="fr">
<head>
	<title>H2Lem</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<!-- 
Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 -->

<!-- Leaflet  -->
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body>
<div id="mapid" style="width: 800px; height: 500px;"></div>

<script>

	var mymap = L.map('mapid').setView([46.201458, 6.147022], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    <?php
        // Requête SQL pour récupérer des données de la base de donnée
        $sql = "SELECT longitude, latitude, idVelo, dateCo FROM Coordonees JOIN Velos USING(idVelo) ORDER BY idVelo, dateCo ASC";
        $query = $db->prepare($sql);
        $query->execute();
        do {
            $record = $query->fetch(PDO::FETCH_ASSOC);
            if($record)
            {
                $longitude = $record['longitude'];
                $latitude = $record['latitude'];
                $currentId = $record['idVelo'];
                $date = $record['dateCo'];
                
                echo "L.marker([".$longitude.",".$latitude."]).addTo(mymap).bindPopup(\"no° ".$currentId." | ".$date."\").openPopup();";
                
                //Si la dernière id est égale à l'id actuelle
                if($lastId == $currentId){
                    //Push les positions du velo
                    array_push($leVelo, [$longitude, $latitude]);
                }
                //Sinon
                else{
                    //Push le vélo dans la liste de vélos
                    array_push($listeVelo, $leVelo);
                    //Clean le vélo
                    $velo = [];
                    //Push le vélo dans la liste de vélo
                    array_push($leVelo, [$longitude, $latitude]);
                }
                //La dernière id devient l'in courrant
                $lastId = $currentId;
            }
        } while($record);
        //Push le vélo dans la liste de vélos
        array_push($listeVelo, $leVelo);
    ?>

    var arrayVelo = <?= json_encode($listeVelo) ?>;
    // Foreach idVelo dans la liste velo dessiner le trait
    var polyline = L.polyline(arrayVelo, {color:'red'}).addTo(mymap);
</script>
<?PHP

var_dump($listeVelo);
?>
</body>

</html>

