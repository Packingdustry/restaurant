<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Gestion du restaurant</title>
    </head>
    <body>
        <h1>Resto</h1>
        <ol>
            <form action="plats_servis.php">
                <h2><li>Liste des plats servis pour une période : </li></h2>
                <p>
                    <input type="date" name="dateD" id="dateDS">
                    <label for="dateDS">Date de début</label>
                </p>
                <p>
                    <input type="date" name="dateF" id="dateFS">
                    <label for="dateFS">Date de fin</label>
                </p>
                <button>Envoyer</button>
            </form>
            <form action="plats_non_servis.php">
                <h2><li>Liste des plats non servis pour une période : </li></h2>
                <p>
                    <input type="date" name="dateD" id="dateDNS">
                    <label for="dateDNS">Date de début</label>
                </p>
                <p>
                    <input type="date" name="dateF" id="dateFNS">
                    <label for="dateFNS">Date de fin</label>
                </p>
                <button>Envoyer</button>
            </form>
            <form action="serveurs.php">
                <h2><li>Liste des serveurs pour une période à une table : </li></h2>
                <p>
                    <label for="dateDServ">Date de début</label><br>
                    <input type="date" name="dateD" id="dateDServ">
                </p>
                <p>
                    <label for="dateFServ">Date de début</label><br>
                    <input type="date" name="dateF" id="dateFServ">
                </p>
                <p>
                    <label for="table">Table</label><br>
                    <select name="table" id="table">
                        <?php
                            $bd;
                            try {
                                $bd = new PDO("mysql:host=localhost; dbname=restaurant; charset=utf8", "root", "");
                            } catch (Exception $e) {
                                die("Erreur : " . $e->getMessage());
                            }
                            
                            $query = $bd->query("SELECT numtab FROM TABL;");
                            while($data = $query->fetch()) {
                                echo "<option value='{$data["numtab"]}'>Table {$data["numtab"]}</option>";
                            }
                        ?>
                    </select>
                </p>
                <button>Envoyer</button>
            </form>
            <form action="CA_serveurs.php">
                <h2><li>Chiffre d'affaire et nombre de commandes par serveur pour une période : </li></h2>
                <p>
                    <label for="dateDCAServ">Date de début</label><br>
                    <input type="date" name="dateD" id="dateDCAServ">
                </p>
                <p>
                    <label for="dateFCAServ">Date de début</label><br>
                    <input type="date" name="dateF" id="dateFCAServ">
                </p>
                <button>Envoyer</button>
            </form>
        </ol>
    </body>
</html>