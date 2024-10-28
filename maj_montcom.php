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
        echo "<h2>Mise à jour du montant de la commande {$_GET["commande"]}. </h2>";
        
        $bd = createPDO();

        $update = $bd->exec("
            UPDATE COMMANDE
            SET montcom = (
                SELECT SUM(prixunit*quantite) FROM CONTIENT
                INNER JOIN PLAT ON CONTIENT.numplat=PLAT.numplat
                WHERE numcom={$_GET["commande"]}
            )
            WHERE numcom={$_GET["commande"]};
        ");

        echo $update . " ligne(s) mise(s) à jour. <br>";

        $query = $bd->query("SELECT * FROM COMMANDE WHERE numcom={$_GET["commande"]}");
        while($data = $query->fetch()) {
            echo "nouveau prix pour la commande n° {$_GET["commande"]} : {$data["montcom"]}<br>";
        }
        ?>
    </body>
</html>