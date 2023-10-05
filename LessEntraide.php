<?php
    session_start(); 
	$Id = $_POST["id"];
    $bdd = new PDO('mysql:host=localhost;dbname=vigilille;charset=utf8;', 'root', 'vigilille');
    $_SESSION['NbPoint'] += 3;
    $newpoint=$_SESSION['NbPoint'];
    $id_users=$_SESSION['id'];
    $req = $bdd->prepare("DELETE FROM `entraide` WHERE `Id_Entraide` = $Id");
    $req->execute();
    $add = $bdd->prepare("UPDATE users SET Compteur = $newpoint WHERE Id_Users = $id_users");
    $add->execute();
    header("Location: entraide.php");
?>