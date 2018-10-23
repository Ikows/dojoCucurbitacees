<?php
// routing.php
$routes = [
    'Login' => [ // Controller
        ['index', '/', ['GET', 'POST']], // action, url, HTTP method
    ],
    'Blog' => [ // Controller
        ['index', '/blog', ['GET', 'POST']], // action, url, HTTP method
        ['add', '/blog/ajouter', ['GET', 'POST']],
        ['delete', '/blog/delete/{id}', ['GET', 'POST']],
    ],

];