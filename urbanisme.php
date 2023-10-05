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

        <p class="Upresentation"><?php echo $_SESSION['prenom']?>, bienvenue sur la page Urbanisme vous avez <?php echo $_SESSION['NbPoint']?> point(s).</p>
            <div class="Ublocform">

                <form action="AddUrbanisation.php" method="post">

                    <h1 class="Upresentation">Ajouter un problème d'urbanisme:</h1>

                    <label for="title">Titre :</label><br>
                    <input type="text" id="title" name="title" placeholder="Résumer votre annonce" required><br>
        
                    <label for="description">Description :</label><br>
                    <textarea id="description" name="description" rows="4" placeholder="Développer le problème rencontré"></textarea><br>
        
                    <label for="street-number">Adresse :</label><br>
                    <div class="address-container">
                        <input type="text" id="street-number" name="street-number" placeholder="Numéro" required>
                        <input type="text" id="street-name" name="street-name" placeholder="Nom de rue" required><br>
                    </div>
        
                    <div class="photo-upload">
                        <label for="photo">Ajouter une photo :</label>
                        <input type="file" id="photo" name="photo">
                    </div>
        
                    <button type="submit">Soumettre</button>
                </form>
            </div>
            
            <div class="Ublocform">
                <form action="LessUrbanisation.php" method="post">

                    <h1 class="Upresentation">Vous avez résolue un problème d'urbanisme ?</h1>

                    <label for="id"># de l'annonce :</label><br>
                    <input type="text" id="title" name="id" placeholder="Rensignez le # en bas à droite de l'annonce." required><br>

                    <div class="photo-upload">
                        <label for="photo">Ajouter une photo :</label>
                        <input type="file" id="photo" name="photo">
                    </div>

                    <button type="submit">Soumettre</button>
                </form>
            </div>
        
            <p class="Upresentation">Voici la liste des problèmes remonté:</p>

            <?php
            
                $bdd = new PDO('mysql:host=localhost;dbname=vigilille;charset=utf8;', 'nolan', 'Nolan0112!');

                $req = $bdd->prepare("SELECT Id_Urbanisme,Titre,Descrip,NumeroDeRue,NomDeRue,NbPoint,Par FROM urbanisme");

                $req->execute();
                ?>
                <div class="container">
                    <?php
                        while ($donnees = $req->fetch()) {
                            echo '<div class="table_result_urbanisation">';
                                echo '<table class="Utable" border="0">';
                                    echo '<tr><td class="Utitre">' . $donnees['Titre'] . '</td></tr>';
                                    echo '<tr><td class="Udescrip">' . $donnees['Descrip'] . '</td></tr>';
                                    echo '<tr><td class="Ulieu">📍' . $donnees['NumeroDeRue'] . ' ' . $donnees['NomDeRue'] .'</td></tr>';
                                    echo '<tr>';
                                        echo '<td class="Upoint">'. $donnees['NbPoint'] . ' point à gagner !</td>';
                                        echo '<td class="Uid">#'. $donnees['Id_Urbanisme'] . '</td>';
                                    echo '</tr>';
                                    echo '<tr><td class="Upoint">Par: ' . $donnees['Par'] . '</td></tr>';
                                echo '</table>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <?php
            ?>

        </main>

        <footer>
            <?php require "html/footer.html" ?>;
        </footer>   
    </body>
</html>
