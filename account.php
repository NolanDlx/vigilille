<!DOCTYPE html>
<html>
    <head>
        <title>VigiLille</title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>

        <header>
            <?php
                session_start(); 
                require "html/header.html";
            ?>
        </header>
        <main>
            <div class="container-perso">
                <div class="blocdonneeperso">
                    <p class="Upresentation">Vos données personnelles:</p>
                    <?php
                        echo'<p class="donneperso">Nom : ' . $_SESSION['nom'] . '</p>';
                        echo'<p class="donneperso">Prénom : ' . $_SESSION['prenom'] . '</p>';
                        echo'<p class="donneperso">Login : ' . $_SESSION['login'] . '</p>';
                        echo'<p class="donneperso">Mot de passe : ' . $_SESSION['pass'] . '</p>';
                        echo'<p class="donneperso">Nombre de point : ' . $_SESSION['NbPoint'] . '</p>';
                        echo'<p class="donneperso">Numéro de téléphone : ' . $_SESSION['NumTel'] . '</p>';
                        echo'<p class="donneperso">Numéro de rue : ' . $_SESSION['NumRue'] . '</p>';
                        echo'<p class="donneperso">Nom de rue : ' . $_SESSION['NomRue'] . '</p>';
                    ?>
                    
                </div>
                
            </div>
            <p class="Upresentation">Pour modifier vos données personnelles, veuillez envoyer un mail à <a href="mailto:support@vigilille.com">support@vigilille.com</a></p>
        </main>
        <footer>
            <?php
                require "html/footer.html";
            ?>
        </footer>
    </body>
</html>