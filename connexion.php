<?php
session_start();

if (isset($_POST['envoyer'])) {
    $identifiant = $_POST['pseudo'];
    $motdepasse = $_POST['mdp'];


    if ($identifiant === 'matteo.oliveira!!' && $motdepasse === '3009?!') {

        $_SESSION['logged_in'] = true;

        header('Location: http://localhost:8888/a-projet_rouge/backoffice/index.php');

        exit();
    } else {

        header('Location: http://localhost:8888/a-projet_rouge/intro.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/connection.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>connection</title>
</head>

<body>
    <div>
        <a href="intro.php"><img src="image/logo_blanc.ico"></a>
    </div>
    <div class="box">

        <form class="formBloc" method="post" action="/connexion.php">


            <h3>Pour ce<strong> connecter </strong></h3>

            <div class="formGroupe">
                <label for="name">pseudo</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>

            <div class="formGroupe">
                <label for="email">mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
            </div>

            <div class="formGroupe">
                <input type="submit" value="ENVOYER" class="button" name="envoyer">
            </div>
        </form>

    </div>
    <footer>
        <a href="footer.php">©</a>
    </footer>
    <script src="script.js"></script>
</body>

</html>