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
        <form action="plats_servis.php">
            <h2>Liste des plats servis pour une période : </h2>
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
            <h2>Liste des plats non servis pour une période : </h2>
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
    </body>
</html>