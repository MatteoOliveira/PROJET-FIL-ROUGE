<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Contact;

class ContactControleur
{
    public function liste()
    {
        $contact = Bdd::select("contact");
        include "vues/header.html.php";
        include "vues/contact/table.html.php";
        include "vues/footer.html.php";
    }

    public function ajouter()
    {
        if ($_POST) {
            $l = new Contact;
            $l->setName($_POST["name"]);
            $l->setEmail($_POST["email"]);
            $l->setMess($_POST["mess"]);
            $resultat = Bdd::insertContact($l);
            if ($resultat) {
                redirection(lien("contact"));
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }

        $contact = new Contact;
        include "vues/header.html.php";
        include "vues/contact/form.html.php";
        include "vues/footer.html.php";
    }
    public function modifier($id)
    {
        $contact = Bdd::selectById("contact", $id);

        if ($_POST) {
            $name = $_POST["name"] ?? null;
            $email = $_POST["email"] ?? null;
            $mess = $_POST["mess"] ?? null;

            if (!empty($name) && !empty($email) && !empty($mess)) {
                if (strlen($name) > 50) {
                    $erreurs["name"] = "Le nom ne doit pas dépasser 50 caractères";
                }
                if (strlen($name) < 4) {
                    $erreurs["titre"] = "Le nom ne doit avoir au moins 4 caractères";
                }
                if (strlen($email) > 30) {
                    $erreurs["email"] = "L'email ne doit pas dépasser 30 caractères";
                }
                if (strlen($email) < 4) {
                    $erreurs["email"] = "L'email doit avoir au moins 4 caractères";
                }
                if (strlen($mess) > 30) {
                    $erreurs["mess"] = "Le message ne doit pas dépasser 30 caractères";
                }
                if (strlen($mess) < 4) {
                    $erreurs["mess"] = "Le message doit avoir au moins 4 caractères";
                }
            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }

            if (empty($erreurs)) {
                $contact->setName($name);
                $contact->setEmail($email);
                $contact->setMess($mess);
                if (Bdd::updateContact($contact)) {
                    // header("Location: contact_liste.php");
                    // exit;
                    redirection(lien("contact"));
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        }
        include "vues/header.html.php";
        include "vues/contact/form.html.php";
        include "vues/footer.html.php";
    }
    public function supprimer($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $contact = Bdd::selectById("contact", $id);
                if ($contact) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (Bdd::deleteContact($contact) == 1) {
                            redirection(lien("contact"));
                        }
                    }
                } else {
                    redirection(lien("contact"));
                }
            }
        }
        affichage("contact/suppression.html.php", ["contact" => $contact]);
    }
}
