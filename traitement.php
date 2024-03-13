<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["intitule"]) && isset($_POST["date_debut"]) && isset($_POST["date_fin"]) && isset($_POST["choix"])) {

        $intitule = $_POST["intitule"];
        $date_debut = $_POST["date_debut"];
        $date_fin = $_POST["date_fin"];
        $choix = $_POST["choix"];


        $host = "localhost";
        $bd = "entreprise";
        $user = "user";
        $password = "Azerty@77";

        try {

            $bdd = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $user, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $req = $bdd->prepare("INSERT INTO projet (intitule, debut, fin, numchef) VALUES (:intitule, :debut, :fin, :numchef)");


            switch ($choix) {
                case 'choix1':
                    $numchef = 16278;
                    break;
                case 'choix2':
                    $numchef = 25717;
                    break;
                case 'choix3':
                    $numchef = 27047;
                    break;
                default:
                    $numchef = null;
            }

            echo "avant execution de la requete";
            echo "$date_debut $date_fin";
            $req->execute(array(
                'intitule' => $intitule,
                'debut' => $date_debut,
                'fin' => $date_fin,
                'numchef' => $numchef
            ));
            echo "requette executeer";
            echo "Projet créé avec succès.";
            header("Location: affiche_infoprojet.php");
            exit; // Assurez-vous de terminer le script après la redirection

        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
