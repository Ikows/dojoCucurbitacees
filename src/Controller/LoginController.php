<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 23/10/18
 * Time: 09:37
 */

namespace Controller;


class LoginController extends AbstractController
{

public function index()
{

    if (!empty($_POST))
    {
        if ($_POST['password']=='courge')
        {
            session_start();
            $_SESSION['user']=$_POST['login'];
            header('Location: /blog');

        }



    }


    return $this->twig->render('login.html.twig');

}

}