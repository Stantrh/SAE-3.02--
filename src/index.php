<?php


require_once "../vendor/autoload.php";


use touiteur\Connection\ConnectionFactory;

ConnectionFactory::setConfig('./config.ini'); //fichier de config pour mysql
ConnectionFactory::makeConnection(); //debut de la connection pour mysql a ne faire qu'une seule fois dans le projet


/*
$db = ConnectionFactory::$db;   // a faire a chaque fois qu'on veut se connecter a la base
$query = "SELECT passwd FROM `User` WHERE email= ?"; //requette sql
$st = $db->prepare($query);
$st->execute(["user1@mail.com"]); //execute la requette et remplace le ? par le parametre dans le tableau
$row = $st->fetch();    //fetch pour l'affichage de la première ligne
echo($row[0]); //affichage de la première ligne
*/
/*
 * si on veux parcourir entièrement le resultat
while($row=$st->fetch(PDO::FETCH_ASSOC)) {

    foreach ($row as $v) {
        echo  $v .":" ;
    }
    echo("\n");

}
*/


echo <<< END
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title> Projet Web </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/index.css" >
	</head>
    <body>

    </body>
</html>
END;
