<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plats servis</title>
    </head>
    <body>
        <h1>Resto</h1>
        <?php
        echo "<h2>Plats non servis entre le " . formatDate($_GET["dateD"]) . " et le " . formatDate($_GET["dateF"]) . ". </h2>";
        
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
            SELECT libelle FROM PLAT
            WHERE libelle NOT IN (
            SELECT DISTINCT libelle FROM `PLAT`
            INNER JOIN CONTIENT ON CONTIENT.numplat=PLAT.numplat
            INNER JOIN COMMANDE ON COMMANDE.numcom=CONTIENT.numcom
            WHERE datcom > str_to_date('". $_GET["dateD"] ."', '%Y-%m-%d')
            AND datcom < str_to_date('". $_GET["dateF"] ."', '%Y-%m-%d'));
        ");
        while($data = $query->fetch()) {
            echo $data["libelle"] . "<br>";
        }
        ?>
    </body>
</html>