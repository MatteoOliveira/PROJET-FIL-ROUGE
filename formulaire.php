<?php include "liaison-contact.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/form.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>contacte</title>
</head>

<body>
    <div>
        <a href="intro.php"><img src="image/logo_blanc.ico"></a>
    </div>
    <div class="box">

        <form class="formBloc" method="post" action="">


            <h3>Pour me<strong> contacter </strong></h3>

            <div class="formGroupe">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required maxlength="16">
            </div>

            <div class="formGroupe">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="formGroupe">
                <label for="mess">Message</label>
                <input type="textarea" id="mess" name="mess" required>
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