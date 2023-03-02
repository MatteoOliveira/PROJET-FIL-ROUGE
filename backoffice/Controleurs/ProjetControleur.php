<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Projet;

class ProjetControleur
{
    public function liste()
    {
        $projet = Bdd::select("projet");
        include "vues/header.html.php";
        include "vues/projet/table.html.php";
        include "vues/footer.html.php";
    }
    public function ajouter()
    {
        if ($_POST) {
            $l = new Projet;
            $l->setImg($_FILES["img"]);
            $l->setDescription($_POST["description"]);
            $resultat = Bdd::insertProjet($l);
            if ($resultat) {
                redirection(lien("projet"));
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }

        $projet = new Projet;
        include "vues/header.html.php";
        include "vues/projet/form.html.php";
        include "vues/footer.html.php";
    }
    public function modifier($id)
    {
        $projet = Bdd::selectById("projet", $id);

        if ($_POST) {
            $img = $_FILES["img"] ?? null;
            $description = $_POST["description"] ?? null;

            if (!empty($description)) {
                if (strlen($description) > 50) {
                    $erreurs["description"] = "Le nom ne doit pas dépasser 50 caractères";
                }
                if (strlen($description) < 4) {
                    $erreurs["description"] = "Le nom ne doit avoir au moins 4 caractères";
                }
            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }

            if (empty($erreurs)) {
                $projet->setImg($img);
                $projet->setDescription($description);
                if (Bdd::updateProjet($projet)) {
                    // header("Location: projet_liste.php");
                    // exit;
                    redirection(lien("projet"));
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        }
        include "vues/header.html.php";
        include "vues/projet/form.html.php";
        include "vues/footer.html.php";
    }
    public function supprimer($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $projet = Bdd::selectById("projet", $id);
                if ($projet) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (Bdd::deleteprojet($projet) == 1) {
                            redirection(lien("projet"));
                        }
                    }
                } else {
                    redirection(lien("projet"));
                }
            }
        }
        affichage("projet/suppression.html.php", ["projet" => $projet]);
    }
}
