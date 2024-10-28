<?php 
declare(strict_types=1);
require_once("fonctions.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Chiffre d'affaire et nombre de commandes par serveurs</title>
    </head>
    <body>
        <h1>Resto</h1>
        <?php
        echo "<h2>Chiffre d'afaire et nombre de commandes par serveur du " . formatDate($_GET["dateD"]) . " au " . formatDate($_GET["dateF"]) . ". </h2>";
        
        $bd = createPDO();

        $query = $bd->query("
            SELECT nomserv, COUNT(DISTINCT COMMANDE.numcom) nbcom, COMMANDE.numcom, SUM(prixunit*quantite) ca FROM SERVEUR
            INNER JOIN AFFECTER ON SERVEUR.numserv=AFFECTER.numserv
            INNER JOIN COMMANDE ON COMMANDE.numtab=AFFECTER.numtab
            INNER JOIN CONTIENT ON CONTIENT.numcom=COMMANDE.numcom
            INNER JOIN PLAT ON PLAT.numplat=CONTIENT.numplat
            WHERE dataff > str_to_date('2016-09-01', '%Y-%m-%d')
            AND dataff < str_to_date('2016-11-01', '%Y-%m-%d')
            GROUP BY (SERVEUR.numserv);
        ");
        ?>
        <table>
            <thead>
                <tr>
                    <th>Serveur</th>
                    <th>Nombre de commandes servies</th>
                    <th>Chiffre d'affaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($data = $query->fetch()) {
                    echo "<tr><td>{$data["nomserv"]}</td><td>{$data["nbcom"]}</td><td>{$data["ca"]}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>