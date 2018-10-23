<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 23/10/18
 * Time: 09:37
 */

namespace Controller;


use Model;

class BlogController extends AbstractController
{

public function index()
{

    $manager = new Model\ArticlesManager($this->pdo);
    $articles = $manager->selectAll();
    return $this->twig->render('blog.html.twig', ['articles' => $articles]);
}

public function add()
{

    if (!empty($_POST))
    {
        /**
         * Insertion de l'image
         */
        $uploadDir = 'assets/images/';
        $uploadFile = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); //préparation du nommage du fichier et du chemin d'acces
        $lastname = $uploadDir . $uploadFile;
        move_uploaded_file($_FILES['image']['tmp_name'], $lastname);





        /**
         * Hydratation de l'article
         */
        $manager = new Model\ArticlesManager($this->pdo);
        $article = new Model\Articles();
        $article->setTitle($_POST['title']);
        $article->setContent($_POST['content']);
        $article->setImage($uploadFile);
        $manager->add($article);
        header('Location: /blog');
    }

    return $this->twig->render('ajout.html.twig');

}

public function delete($id)
{
    $manager = new Model\ArticlesManager($this->pdo);
    $article = $manager->selectOneById($id);
    $manager->delete($article);
    header('Location: /blog');

}

}

