<?php

    session_start(); 
	
	$Titre = $_POST["title"];
	$Descrip = $_POST["description"];
    $NumeroDeRue = $_POST["street-number"];
	$NomDeRue = $_POST["street-name"];

    $_SESSION['NbPoint'] += 1;

    $newpoint=$_SESSION['NbPoint'];
    $id_users=$_SESSION['id'];
    $prenom=$_SESSION['prenom'];

    $bdd = new PDO('mysql:host=localhost;dbname=vigilille;charset=utf8;', 'nolan', 'Nolan0112!');

    $req = $bdd->prepare("INSERT INTO urbanisme(Titre,Descrip,NumeroDeRue,NomDeRue,NbPoint,Par) VALUES ('$Titre','$Descrip','$NumeroDeRue','$NomDeRue','3','$prenom')");

    $req->execute();

    $add = $bdd->prepare("UPDATE users SET Compteur = $newpoint WHERE Id_Users = $id_users");

    $add->execute();

    header("Location: urbanisme.php");

?>