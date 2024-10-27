<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Serveurs en service</title>
    </head>
    <body>
        <h1>Resto</h1>
        <?php
        echo "<h2>Serveurs ayant servit la table {$_GET["table"]} du " . formatDate($_GET["dateD"]) . " au " . formatDate($_GET["dateF"]) . ". </h2>";
        
        function formatDate(string $date): string {
            $tmp = explode("-", $date);
            $date = $tmp[2] . '/' . $tmp[1] . '/' . $tmp[0];
            return $date;
        }
        
        $bd;
        try {
            $bd = new PDO("mysql:host=localhost; dbname=restaurant; charset=utf8", "root", "");
        } catch(Exception $e) {
            die("Erreur : " . $e->getMessage());
        }

        $query = $bd->query("
            SELECT nomserv, dataff FROM SERVEUR
            INNER JOIN AFFECTER ON SERVEUR.numserv=AFFECTER.numserv
            WHERE numtab={$_GET["table"]}
            AND dataff > str_to_date('{$_GET["dateD"]}', '%Y-%m-%d')
            AND dataff < str_to_date('{$_GET["dateF"]}', '%Y-%m-%d');
        ");
        while($data = $query->fetch()) {
            echo "{$data["nomserv"]}, " . formatDate($data["dataff"]) . "<br>";
        }
        ?>
    </body>
</html>