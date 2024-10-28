<?php 
declare(strict_types=1);
require_once("fonctions.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plats servis</title>
    </head>
    <body>
        <h3><a href="./">↩ retour</a></h3>
        <h1>Resto</h1>
        <?php
        echo "<h2>Plats servis entre le " . formatDate($_GET["dateD"]) . " et le " . formatDate($_GET["dateF"]) . ". </h2>";
        
        $bd = createPDO();

        $query = $bd->query("
            SELECT DISTINCT libelle FROM `PLAT`
            INNER JOIN CONTIENT ON CONTIENT.numplat=PLAT.numplat
            INNER JOIN COMMANDE ON COMMANDE.numcom=CONTIENT.numcom
            WHERE datcom > str_to_date('{$_GET["dateD"]}', '%Y-%m-%d')
            AND datcom < str_to_date('{$_GET["dateF"]}', '%Y-%m-%d');
        ");

        while($data = $query->fetch()) {
            echo $data["libelle"] . "<br>";
        }
        ?>
    </body>
</html>