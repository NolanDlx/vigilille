<!DOCTYPE html>
<html>
    <head>
        <title>VigiLille</title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>

        <?php
            session_start(); 

            $admin = 2;
            $users = 1;

            $bdd = new PDO('mysql:host=localhost; dbname=vigilille;charset=utf8;', 'nolan', 'Nolan0112!');
            
            if(!empty($_POST['login']) AND !empty($_POST['pass'])){
                $login = $_POST['login'];
                $pass = $_POST['pass'];
    
                $recupUser = $bdd->prepare('Select * from users where Login = ? and MotDePasse = ?');
                $recupUser->execute(array($login, $pass));

                if($recupUser->rowCount() > 0)
                {
    
                    $resulta = $recupUser->fetch();
    
                    $_SESSION['login'] = $resulta['Login'];
                    $_SESSION['pass'] = $resulta['MotDePasse'];
                    $_SESSION['id'] = $resulta['Id_Users'];
                    $_SESSION['role'] = $resulta['Role'];
                    $_SESSION['NbPoint'] = $resulta['Compteur'];
                    $_SESSION['nom'] = $resulta['Nom'];
                    $_SESSION['prenom'] = $resulta['Prenom'];
                    $_SESSION['NumTel'] = $resulta['Tel'];
                    $_SESSION['NumRue'] = $resulta['NumeroDeRue'];
                    $_SESSION['NomRue'] = $resulta['NomDeRue'];
                }
                else
                {
                    $erreur = 'Votre mot de passe ou login est incorrect...';
                }
            }
            else
            {
                $erreur = 'Veuillez compléter tous les champs ...';
            }
        ?>
   

   

        <header>
            <?php require "html/header.html" ?>;
        </header>

        

        

        <main>

        <div class="container-conn">
        <h2>Connexion</h2>
            <form method="POST" action="">
                <input type="text" name="login" autocomplete="off" placeholder="Login">
                <br><br>
                <input type="password" name="pass" autocomplete="off" placeholder="Mot de passe">
                <br><br>
                <input type="submit" name="connexion" value="Se connecter">
            </form>
        </div>

            <p class="text_accueil">
                <span class="Vigilille">VigiLille</span> vise à renforcer la communauté en permettant aux citoyens de signaler des problèmes, de demander de l'aide, et de récompenser la contribution citoyenne en encourageant les achats dans les petits commerces de la région. Cela favorise un sentiment d'appartenance à la communauté et un meilleur environnement urbain.<br><br>
            
                Urbanisme - Cette section permet aux citoyens de signaler des problèmes liés à l'urbanisme tels que des nids-de-poule, des routes encombrées, des fuites d'eau, des ampoules défectueuses, etc.<br><br>
                
                Entraide Citoyenne - Cette catégorie facilite la demande et la fourniture d'aide citoyenne. Les services incluent du pet-sitting, des courses pour les personnes à mobilité réduite, le prêt de matériel, et bien plus encore.<br><br>
                
                Comment fonctionne <span class="Vigilille">VigiLille</span> ?</br><br>
                
                Signalement des problèmes d'ordre citoyen : Les citoyens peuvent utiliser le site pour signaler divers problèmes urbains, ce qui contribue à améliorer la qualité de vie dans la ville.<br><br>
                
                Demande d'aide citoyenne : Les citoyens peuvent solliciter de l'aide pour des tâches diverses, favorisant la solidarité entre les habitants de la région.<br><br>
                
                Système de points : Chaque citoyen se voit attribuer des points en fonction de l'aide citoyenne qu'il apporte. Ces points peuvent être utilisés pour obtenir des bons de réduction valables dans les petits commerces locaux.<br><br>
                
                Nous avons comme volonté de rapprocher les citoyens et permettre à la ville d’être plus belle et moins endommagée.
           </p>
        </main>

        <footer>
            <?php require "html/footer.html" ?>;
        </footer>   
    </body>
</html>