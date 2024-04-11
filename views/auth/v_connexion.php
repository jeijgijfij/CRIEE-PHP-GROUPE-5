<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Criée</title>
    <link rel="stylesheet" href="assets/home_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500&display=swap" rel="stylesheet">
    <link href="https://css.gg/css?=|heart|shape-rhombus|user|check" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <script src="https://mempool.space/mempool.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('views/home/navbar2.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-container').innerHTML = data;

                    const navbar = document.querySelector('.navbarX');
                    const scrollThreshold = 50;

                    window.addEventListener('scroll', () => {
                        const scrollPosition = window.scrollY;

                        if (scrollPosition > scrollThreshold) {
                            navbar.style.backgroundColor = '#0C0B12';
                        } else {
                            navbar.style.backgroundColor = 'transparent';
                        }
                    });
                });
        });
    </script>
</head>
<body>

    <div class="bg-wrap-a">
        <div id="navbar-container"></div>
        <form id="connection-form" class="connection" action="index.php?action=login" method="POST">
            <h1>Connexion</h1>
            <div class="field">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="field">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div id="connection-btn">
                <button id="button3" type="submit">Se connecter</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>

