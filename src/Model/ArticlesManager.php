<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 23/10/18
 * Time: 10:47
 */

namespace Model;
use Model\Articles;

class ArticlesManager extends AbstractManager
{
    const TABLE = 'articles';

    public function __construct($pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function add(Articles $article)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " VALUES (null, :title, :content, :image)");
        $statement->bindValue('title', $article->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('content', $article->getContent(), \PDO::PARAM_STR);
        $statement->bindValue('image', $article->getImage(), \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(Articles $article)
    {
        $statement = $this->pdo->prepare("DELETE FROM " . SELF::TABLE . " WHERE id = :id");
        $statement->bindValue('id', $article->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

}
