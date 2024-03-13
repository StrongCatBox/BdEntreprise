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
                            <th scope="col">Projet</th>
                            <th scope="col">Date début</th>
                            <th scope="col">Chef de projet</th>
                            <th scope="col">Nom employé</th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Mission</th>
                            <th scope="col">Date affectation</th>

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
                        $req = $bdd->prepare("SELECT 
                                p.intitule AS 'Projet', 
                                 p.debut AS 'Date début', 
                                emp1.Nom AS 'Chef de projet', 
                                emp2.Nom AS 'Nom employé', 
                                emp2.Fonction AS 'Fonction', 
                                ap.mission AS 'Mission', 
                                ap.date_affectation AS 'Date affectation'
                                FROM 
                                projet p
                                JOIN 
                            emp emp1 ON p.numchef = emp1.Numero
                                JOIN 
                            affectationprojet ap ON p.numProjet = ap.numProjet
                            JOIN 
                             emp emp2 ON ap.num_Emp = emp2.Numero; ");


                        // exécution de la requête
                        $req->execute();
                        while ($donnees = $req->fetch()) // On affiche chaque entrée une à une
                        {

                            $projet   = $donnees['Projet'];
                            $datedebut    = $donnees['Date début'];
                            $chefprojet   = $donnees['Chef de projet'];
                            $employe    = $donnees['Nom employé'];
                            $fonction     = $donnees['Fonction'];
                            $mission     = $donnees['Mission'];
                            $dateaffectation     = $donnees['Date affectation'];

                            echo "<tr><td>$projet</td><td>$datedebut</td><td>$chefprojet</td>
       <td>$employe</td><td>$fonction</td><td>$mission</td><td>$dateaffectation</td></tr>";
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