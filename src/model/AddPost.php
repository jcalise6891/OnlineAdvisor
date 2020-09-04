<?php


namespace App\model;

use App\Entity\Article;

class AddPost
{
    public static function AddNewArticle(Article $article, \PDO $db):bool
    {
        $newArticleName = $article->getTitle();
        if (self::verifyDuplicate($newArticleName, $db)) {
            $sql = 'INSERT INTO article (art_name,art_user,art_note,art_content,art_category)
                    VALUES(:title,:userName,:note,:content,:category)';
            $query= $db->prepare($sql);
            $query->bindValue(':title', $article->getTitle());
            $query->bindValue(':userName', $article->getAuthor());
            $query->bindValue(':note', $article->getNote());
            $query->bindValue(':content', $article->getContent());
            $query->bindValue(':category', $article->getCategory());
            return $query->execute();
        }
    }

    private static function verifyDuplicate(string $titre, \PDO $db):bool
    {
        $sql = 'SELECT art_name
                FROM article
                WHERE art_name = :titreNewArticle';

        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->bindValue(':titreNewArticle', $titre, \PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (!$result) {
            return true;
        } else {
            return false;
        }
    }
}
