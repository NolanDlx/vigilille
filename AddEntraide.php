<?php
    session_start(); 
	
	$Titre = $_POST["title"];
    $Descrip = $_POST["description"];
    $Contact = $_POST["contact"];

    $_SESSION['NbPoint'] += 1;

    $newpoint = $_SESSION['NbPoint'];
    $id_users = $_SESSION['id'];
    $prenom = $_SESSION['prenom'];

    $bdd = new PDO('mysql:host=localhost;dbname=vigilille;charset=utf8;', 'root', 'vigilille');

    $req = $bdd->prepare("INSERT INTO entraide (Titre, Descrip, Contact, NbPoint, Par) VALUES (:Titre, :Descrip, :Contact, '3', :prenom)");
    $req->bindParam(':Titre', $Titre);
    $req->bindParam(':Descrip', $Descrip);
    $req->bindParam(':Contact', $Contact);
    $req->bindParam(':prenom', $prenom);
    $req->execute();



    $add = $bdd->prepare("UPDATE users SET Compteur = $newpoint WHERE Id_Users = $id_users");

    $add->execute();

    header("Location: entraide.php");

?>