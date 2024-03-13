<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Tableau Projet</title>
</head>

<body>

    <!--Header-->

    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://forpro-paca.com/lib/bitmaps/PopUp/popup-GRETA-Nice.jpg" height="30" alt="MDB Logo" loading="lazy" href="/SQL/Projet%20-%201/affiche_livre2.php" />
                </a>
                <h1 class="text-center mx-auto">Bibliotheque</h1>
            </div>
        </nav>

    </header>

    <!--Header-->


    <div class="container-fluid">
        <div class="row">
            <!-- Navbar à gauche -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/SQL/Projet%20-%201/creerprojet.php">
                                Creer projet
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Infos sur les projets
                            </a>
                        </li>
                        <!-- Ajoutez d'autres liens au besoin -->
                    </ul>
                </div>
            </nav>

            <!-- Contenu principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1>Liste des livres</h1>
                <table class="table table-striped" id="customers">
                    <tr>
                        <th>Nom du projet</th>
                        <th>Intitulé</th>
                        <th>Nom du chef</th>
                        <th>Nom employé</th>
                        <th>Fonction</th>
                        <th>mission</th>
                        <th>date d'affection</th>
                    </tr>
                    <?php
                    // paramètres de connexion
                    $host = "localhost";
                    $bd = "entreprise";
                    $user = "user";
                    $password = "Azerty@77";

                    //tentative de connexion
                    try {
                        $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
                        // preparation d'une requête requete a trou pour plus de securité
                        $req = $bdd->prepare('SELECT * FROM livre WHERE auteur LIKE :auteur AND genre LIKE :genre ');
                        // paramètre à inserer dans la requête
                        $genre = '%';
                        $auteur = '%';
                        // exécution de la requête
                        $req->execute(array('auteur' => $auteur, 'genre' => $genre));
                        while ($donnees = $req->fetch()) // On affiche chaque entrée une à une
                        {

                            $numero   = $donnees['numlivre'];
                            $titre    = $donnees['Titre'];
                            $auteur   = $donnees['auteur'];
                            $genre    = $donnees['genre'];
                            $prix     = $donnees['prix'];

                            echo "<tr><td>$numero</td><td>$titre</td><td>$auteur</td>
       <td>$genre</td><td>$prix</td></tr>";
                        }
                        $req->closeCursor(); // Termine le traitement de la requête
                    } catch (Exception $e) {
                        die("erreur de connexion");
                    }
                    ?>
                </table>
            </main>
        </div>
    </div>
</body>

</html>