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
        <title>Serveurs n'ayant pas fait de chiffre d'affaire</title>
    </head>
    <body>
        <h3><a href="./">↩ retour</a></h3>
        <h1>Resto</h1>
        <?php
        echo "<h2>Serveurs n'ayant pas fait de chiffre d'affaire du " . formatDate($_GET["dateD"]) . " au " . formatDate($_GET["dateF"]) . ". </h2>";
        
        $bd = createPDO();

        $query = $bd->query("
            SELECT nomserv FROM SERVEUR
            WHERE nomserv NOT IN (
                SELECT nomserv FROM SERVEUR
                INNER JOIN AFFECTER ON SERVEUR.numserv=AFFECTER.numserv
                INNER JOIN COMMANDE ON COMMANDE.numtab=AFFECTER.numtab
                INNER JOIN CONTIENT ON CONTIENT.numcom=COMMANDE.numcom
                INNER JOIN PLAT ON PLAT.numplat=CONTIENT.numplat
                WHERE dataff > str_to_date('{$_GET["dateD"]}', '%Y-%m-%d')
                AND dataff < str_to_date('{$_GET["dateF"]}', '%Y-%m-%d')
                GROUP BY (SERVEUR.numserv)
            );
        ");
        while($data = $query->fetch()) {
            echo "{$data["nomserv"]}<br>";
        }
        ?>
    </body>
</html>