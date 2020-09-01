<?php


namespace App\Model;

use App\Entity\Article;

class PostList
{
    /**
     * @param $id
     * @return Article
     * @throws \Exception
     */

    public static function retrieveSinglePost($id):Article
    {
        if (1 === preg_match('~^[0-9]$~', $id)) {
            $connexion = new ConnexionDB(
                'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                'root',
                'root'
            );
            $db = $connexion->openCon();
            $sql = "SELECT * FROM article WHERE art_ID = :id";
            $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $query->bindValue(':id', $id, \PDO::PARAM_INT);
            $query->execute();

            $rawArticle = $query->fetch();

            if ($rawArticle) {
                return new Article(
                    $rawArticle['art_user'],
                    $rawArticle['art_name'],
                    $rawArticle['art_content'],
                    $rawArticle['art_category'],
                    $rawArticle['art_note']
                );
            } else {
                throw new \InvalidArgumentException('There is no post with this ID');
            }
        } else {
            throw new \InvalidArgumentException('This is not a number');
        }
    }

    public static function retrievePostList():array
    {
        $connexion = new ConnexionDB(
            'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
            'root',
            'root'
        );
        $db = $connexion->openCon();
        $sql = 'SELECT * FROM article';
        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->execute();
        return $query->fetchAll();
    }

    public static function retrieveCommentList($id):array
    {
        $connexion = new ConnexionDB(
            'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
            'root',
            'root'
        );
        $db = $connexion->openCon();
        $sql= 'SELECT comment.com_user, comment.com_content, comment.com_artID, user.fullname 
            FROM comment, user
            WHERE com_artID = :id AND com_user = user.email ';
        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
