<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/views',
]);

$twig = new Twig_Environment($loader, [
    //'cache' => null,
]);

//On Met en place la base
$dsn        = 'mysql:host=localhost;dbname=blog';
$user       = 'root';
$password   = 'roo';

//On se test la connexion a la base , si il y a un probleme , on lance une exception
try {
    $pdo = new PDO($dsn,$user,$password);
}catch (PDOException $e){
    mail('baptiste.gillard+error@gmail.com','Erreur sur de connexion a la pdo sur mon site',$e->getMessage());
    echo 'Erreur de connec maggle';
    die;
    //var_dump($e);
};


echo $twig->render('Blog/article.html.twig', [
    'articles' => $articles,
]);