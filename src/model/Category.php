<?php


namespace App\model;

class Category
{
    public static function retrieveCategoryList():array
    {
        $connexion = new ConnexionDB(
            'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
            'root',
            'root'
        );
        $db = $connexion->openCon();
        $sql = "SELECT DISTINCT art_category FROM article";
        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->execute();
        return $query->fetchAll();
    }

    public static function retrieveSingleCategory(string $category):array
    {
        $connexion = new ConnexionDB(
            'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
            'root',
            'root'
        );
        $db = $connexion->openCon();
        $sql = "SELECT * FROM article WHERE art_category = :category";
        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->bindValue(':category', $category, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }
}
