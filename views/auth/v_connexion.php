<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <div class="login-form">
        <h1>Connexion</h1>

        <?php if ($error === false) { ?>
            <p>Erreur</p>
        <?php } ?>

        <form action="index.php?action=login" method="post">
            <div class="field">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" required>
            </div>
            <div class="field">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>