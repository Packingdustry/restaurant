<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion du restaurant</title>
    </head>
    <body>
        <h1>Resto</h1>
        <h2>Liste des plats servis pour une période : </h2>
        <form action="plats_servis.php">
            <p>
                <input type="date" name="dateD">
                <label for="dateD">Date de début</label>
            </p>
            <p>
                <input type="date" name="dateF">
                <label for="dateF">Date de fin</label>
            </p>
            <button>Envoyer</button>
        </form>
    </body>
</html>