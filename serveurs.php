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
        <title>Serveurs en service</title>
    </head>
    <body>
        <h3><a href="./">↩ retour</a></h3>
        <h1>Resto</h1>
        <?php
        echo "<h2>Serveurs ayant servit la table {$_GET["table"]} du " . formatDate($_GET["dateD"]) . " au " . formatDate($_GET["dateF"]) . ". </h2>";
        
        $bd = createPDO();

        $query = $bd->query("
            SELECT nomserv, dataff FROM SERVEUR
            INNER JOIN AFFECTER ON SERVEUR.numserv=AFFECTER.numserv
            WHERE numtab={$_GET["table"]}
            AND dataff > str_to_date('{$_GET["dateD"]}', '%Y-%m-%d')
            AND dataff < str_to_date('{$_GET["dateF"]}', '%Y-%m-%d');
        ");
        ?>
        <table>
            <thead>
                <tr>
                    <th>Serveur</th>
                    <th>Date du service</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($data = $query->fetch()) {
                    echo "<tr><td>{$data["nomserv"]}</td><td>" . formatDate($data["dataff"]) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>