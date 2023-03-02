<?php

include "includes/init.inc.php";

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
    header('Location: http://localhost:8888/a-projet_rouge/backoffice/index.php');
    exit();
}

$methode =     $_GET["methode"] ?? "liste";
$controleur =  $_GET["controleur"] ?? "home";
$id =          $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
/* j'instancie un objet Controleur de manière dynamique ($nomClasse peut avoir n'importe quel nom de classe Controleur) */
$controleur = new $nomClasse;
$controleur->$methode($id);
