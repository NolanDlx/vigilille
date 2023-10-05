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

            $bdd = new PDO('mysql:host=localhost;dbname=vigilille;charset=utf8;', 'root', 'vigilille');
            
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
            <span class="Vigilille">VigiLille</span> s'engage à renforcer notre communauté en offrant aux citoyens la possibilité de signaler des problèmes, de demander de l'aide, et de récompenser leur contribution citoyenne en encourageant les achats dans les petits commerces locaux. Cette initiative vise à créer un sentiment d'appartenance à la communauté tout en améliorant notre environnement urbain.<br><br>

            **Urbanisme** : Cette section permet aux citoyens de signaler divers problèmes liés à l'urbanisme, tels que des nids-de-poule, des routes encombrées, des fuites d'eau, des ampoules défectueuses, etc.<br><br>

            **Entraide Citoyenne** : Cette catégorie facilite la demande et la fourniture d'aide entre citoyens. Les services incluent le pet-sitting, les courses pour les personnes à mobilité réduite, le prêt de matériel, et bien plus encore.<br><br>

            **Comment fonctionne VigiLille ?**<br><br>

            - **Signalement des problèmes citoyens** : Les citoyens peuvent utiliser notre site pour signaler divers problèmes urbains, contribuant ainsi à améliorer la qualité de vie dans notre ville.<br><br>

            - **Demande d'aide citoyenne** : Les citoyens peuvent solliciter de l'aide pour diverses tâches, renforçant ainsi la solidarité entre les habitants de notre région.<br><br>

            - **Système de points** : Chaque citoyen se voit attribuer des points en fonction de l'aide citoyenne qu'il apporte. Ces points peuvent être échangés contre des bons de réduction valables chez nos petits commerces locaux partenaires.<br><br>

            Notre objectif est de rapprocher les citoyens, de contribuer à l'embellissement de notre ville et de la maintenir en bon état.
        </p>
        </main>

        <footer>
            <?php require "html/footer.html" ?>;
        </footer>   
    </body>
</html>