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


    <div class="container-fluid">

        <div class="row">


            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/SQL/Projet%20-%201/creerprojet.php">
                                Creer projet
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/SQL/Projet%20-%201/affiche_projet.php">
                                Infos sur les projets
                            </a>
                        </li>
                        <!-- Ajoutez d'autres liens au besoin -->
                    </ul>
                </div>
            </nav>






            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">numProjet</th>
                            <th scope="col">intitule</th>
                            <th scope="col">debut</th>
                            <th scope="col">fin</th>
                            <th scope="col">num chef</th>


                        </tr>
                    </thead>

                    <?php
                    // paramètres de connexion
                    $host = "localhost";
                    $bd = "entreprise";
                    $user = "user";
                    $password = "Azerty@77";

                    //tentative de connexion
                    try {
                        $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
                        // preparation d'une requête = requête à trou pour plus de sécurité
                        $req = $bdd->prepare("SELECT * FROM projet ");

                        echo "execution de la requete";


                        // exécution de la requête
                        $req->execute();
                        while ($donnees = $req->fetch()) // On affiche chaque entrée une à une
                        {

                            $numProjet   = $donnees['numProjet'];
                            $intitule    = $donnees['intitule'];
                            $debut   = $donnees['debut'];
                            $fin    = $donnees['fin'];
                            $numchef     = $donnees['numchef'];

                            echo "<tr><td>$numProjet</td><td>$intitule</td><td>$debut</td>
       <td>$fin</td><td>$numchef</td></tr>";
                        }
                        $req->closeCursor(); // Termine le traitement de la requête
                    } catch (Exception $e) {
                        die("erreur de connexion");
                    }
                    ?>
            </main>
        </div>
    </div>
</body>

</html>