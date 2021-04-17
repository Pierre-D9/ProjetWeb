<?php
require_once("models/accesBDD.php");
$dbh=connexion();
$rs = rechercherLesTypesDeCours($dbh);
while($row = $rs->fetch()){
    echo("type : ".$row[1]."<br/>");
}