<?php
try {
    $pdo = new PDO("mysql:host=localhost:8889;dbname=admin", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "L'envoie du formulaire à echoué " . $e->getMessage();
}
if (isset($_POST["envoyer"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mess = $_POST["mess"];

    $Format_Email = '#[a-z0-9]{1,}[\-\_\.a-z0-9]{0,}@[a-z]{2,}[\-\_\.a-z0-9]{0,}\.[a-z]{2,6}$#';
    $Format_Content = '#^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\.\_\-\s]{5,500}$#';

    $sql = ("INSERT INTO `contact`( name, email, mess) VALUES ( :name, :email, :mess)");
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mess', $mess);
    $stmt->execute();
};
