<?php

function compteur($page){

	include('bdd.php');

	$url = $page;
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('d-m-Y');

	$m = $bdd->query('SELECT * FROM Compteur WHERE Page="'.$url.'" AND DateJour="'.$date.'"');
    if($mr = $m->fetch()){

    	if($mr['LasteIp'] == $ip){

    		return;

    	}else{

    		$newNombre = $mr['Nombre']+1;
    		$req = $bdd->exec('UPDATE Compteur SET Nombre="'.$newNombre.'", LasteIp="'.$ip.'" WHERE Id="'.$mr['Id'].'"');

    	}

    }else{

    	$stmtt = $bdd->prepare("INSERT INTO Compteur (Page, DateJour, Nombre, LasteIp) VALUES ( :Page, :DateJour, :Nombre, :LasteIp)");
	$stmtt->bindParam(':Page', $PageS);
	$stmtt->bindParam(':DateJour', $DateJourS);
	$stmtt->bindParam(':Nombre', $NombreS);
	$stmtt->bindParam(':LasteIp', $LasteIpS);

	$PageS = $url;
	$DateJourS = $date;
	$NombreS = '1';
	$LasteIpS = $ip;
						
	$stmtt->execute();

    }

}

?>
