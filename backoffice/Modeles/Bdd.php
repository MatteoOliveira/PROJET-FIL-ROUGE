<?php

/**
 * Le mot-clé 'abstract' avant le mot 'class' permet de définir une classe abstraite.
 * 1. Une classe abstraite ne peut être instanciée (on ne peut pas écrire $bdd = new Bdd;)
 * 2. Dans une classe abstraite, on peut définir des méthodes abstraites.
 *    Ces méthodes n'auront pas de code, juste une définition.
 *      ex: public function test(arg1, arg2);
 *    Il n'y a pas {} et il y a un ; après les () de la méthode abstraite.
 *     - Toutes les classes qui héritent d'une classe abstraite doivent implémenter les méthodes abstraites définies dans la classe mère.
 * (implémenter = fournir du code à cette fonction)
 */

namespace Modeles;

use Collator;
use PDO;
use Modeles\Entites\Contact;
use Modeles\Entites\Projet;

/**
 *  use pour dire que pdo n'est pas dans le namespace
 */

abstract class Bdd
{
    public static function pdo()
    {
        return new PDO("mysql:host=localhost:8889;dbname=admin", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT]);
    }
    public static function select(string $table)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
    }

    public static function selectById(string $table, int $id)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }

    public static function insertContact(Contact $contact)
    {
        $texteRequete = "INSERT INTO contact (name, email, mess) 
                         VALUES (:name, :email, :mess)";
        //1. je prépare la requête avec des paramètres (mais elle n'est pas exécutée)
        $pdostatement = self::pdo()->prepare($texteRequete);
        //2. je donne une valeur à chaque paramètre de la requête préparée 
        $pdostatement->bindValue(":name", $contact->getName());
        $pdostatement->bindValue(":email", $contact->getEmail());
        $pdostatement->bindValue(":mess", $contact->getMess());
        //3. j'exécute la requête
        return $pdostatement->execute();
        //4. la fonction execute() renvoie un booléen, faux s'il y a eu une erreur SQL
    }

    public static function updateContact(Contact $contact): bool
    {
        $texteRequete = "UPDATE contact
        SET name = :name, email = :email, mess = :mess
        WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":name", $contact->getName());
        $pdostatement->bindValue(":email", $contact->getEmail());
        $pdostatement->bindValue(":mess", $contact->getMess());
        $pdostatement->bindValue(":id", $contact->getId());
        return $pdostatement->execute();
    }

    public static function deleteContact(Contact $contact)
    {
        return self::pdo()->exec("DELETE FROM Contact WHERE id=" . $contact->getId());
    }






    public static function insertProjet(Projet $projet)
    {
        $texteRequete = "INSERT INTO projet (img, description) 
                         VALUES (:img, :description)";
        //1. je prépare la requête avec des paramètres (mais elle n'est pas exécutée)
        $pdostatement = self::pdo()->prepare($texteRequete);
        //2. je donne une valeur à chaque paramètre de la requête préparée 
        $pdostatement->bindValue(":img", $projet->getImg(), PDO::PARAM_LOB);
        $pdostatement->bindValue(":description", $projet->getDescription());
        //3. j'exécute la requête
        return $pdostatement->execute();
        //4. la fonction execute() renvoie un booléen, faux s'il y a eu une erreur SQL
    }

    public static function updateProjet(Projet $projet): bool
    {
        $texteRequete = "UPDATE projet
        SET img = :img, description = :description
        WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":img", $projet->getImg());
        $pdostatement->bindValue(":description", $projet->getDescription());
        $pdostatement->bindValue(":id", $projet->getId());
        return $pdostatement->execute();
    }

    public static function deleteProjet(Projet $projet)
    {
        return self::pdo()->exec("DELETE FROM Projet WHERE id=" . $projet->getId());
    }
}
