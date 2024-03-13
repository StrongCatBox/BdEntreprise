<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <a href="/SQL/Projet%20-%201/affiche_projet.php"><img src="https://forpro-paca.com/lib/bitmaps/PopUp/popup-GRETA-Nice.jpg" height="30" alt="MDB Logo" loading="lazy" /></a>
                </a>
                <h1 class="text-center mx-auto">Bibliotheque</h1>
            </div>
        </nav>

    </header>


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
                            <a class="nav-link" href="/SQL/Projet%20-%201/affiche_projet.php">
                                Infos sur les projets
                            </a>
                        </li>
                        <!-- Ajoutez d'autres liens au besoin -->
                    </ul>
                </div>
            </nav>

            <!-- Contenu principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


                <div class="container mt-5">
                    <h2>Création de projet</h2>
                    <form action="traitement.php" method="post">
                        <div class="form-group">
                            <label for="intitule">Intitulé :</label>
                            <input type="text" class="form-control" id="intitule" name="intitule">
                        </div>
                        <div class="form-group">
                            <label for="date_debut">Date de début :</label>
                            <input type="date" class="form-control" id="date_debut" name="date_debut">
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date de fin :</label>
                            <input type="date" class="form-control" id="date_fin" name="date_fin">
                        </div>
                        <div class="form-group">
                            <label for="choix">Choix :</label>
                            <select class="form-control" id="choix" name="choix">
                                <option value="choix1">Choix 1</option>
                                <option value="choix2">Choix 2</option>
                                <option value="choix3">Choix 3</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer Projet</button>
                    </form>
                </div>

            </main>
        </div>
    </div>




</body>