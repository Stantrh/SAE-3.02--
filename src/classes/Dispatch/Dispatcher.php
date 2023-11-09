<?php

namespace touiteur\Dispatch;

use touiteur\Action\ActionAfficherListeTouite;
use touiteur\Action\ActionAfficherListeTouitePaginer;
use touiteur\Action\ActionAfficherListeTouiteUser;
use touiteur\Action\ActionAfficherStatistiqueCompte;
use touiteur\Action\ActionAfficherTouiteDetail;
use touiteur\Action\ActionDefault;
use touiteur\Action\ActionPublierTouite;
use touiteur\Action\ActionSignUp;
use touiteur\Action\ActionSignIn;
use touiteur\Action\ActionSuivreTag;
use touiteur\Action\ActionSuivreUtilisateur;
use touiteur\Action\ActionSupprimerTouite;

class Dispatcher
{

    private string $action;

    public function __construct(){
        if(!isset($_GET['action']))
            $_GET['action'] = 'default';
        $this->action = $_GET['action'];

    }


    public function run():void{
        switch($this->action){
            case 'signup':
                $action = new ActionSignUp();
                self::renderPage($action->execute());
                break;
            case 'signin':
                $action= new ActionSignIn();
                self::renderPage($action->execute());
                break;
            case "afficher-liste-touite":
                $action=new ActionAfficherListeTouite(ActionAfficherListeTouite::DEFAULT);
                self::renderPage($action->execute());
                break;
            case "afficher-touite-detail":
                $action=new ActionAfficherTouiteDetail();
                self::renderPage($action->execute());
                break;
            case "afficher-touite-user":
                $action=new ActionAfficherListeTouite(ActionAfficherListeTouite::UTILISATEUR);
                self::renderPage($action->execute());
                break;
            case "afficher-liste-touite-paginer":
                $action=new ActionAfficherListeTouite(ActionAfficherListeTouite::PAGINER);
                $this->renderPage($action->execute());
                break;
            case "afficher-liste-tag":
                $action=new ActionAfficherListeTouite(ActionAfficherListeTouite::TAG);
                self::renderPage($action->execute());
                break;
            case "publier-touite":
                $action=new ActionPublierTouite();
                $this->renderPage($action->execute());
                break;
            case "supprimer-touite":
                $action=new ActionSupprimerTouite();
                $this->renderPage($action->execute());
                break;
            case "suivre-user":
                $action=new ActionSuivreUtilisateur();
                $this->renderPage($action->execute());
                break;
            case "suivre-tag":
                $action=new ActionSuivreTag();
                $this->renderPage($action->execute());
                break;

            case "statistique-compte":
                $action=new ActionAfficherStatistiqueCompte();
                $this->renderPage($action->execute());
                break;
            default:
                $action=new ActionDefault();
                self::renderPage($action->execute());
                break;
        }

    }


    /*
     * renderPage render html page
     */
    private function renderPage(string $html):void{

        $css = __DIR__.'/../../css/index.css';
        echo <<<END
                <!DOCTYPE html>
                <html lang="fr">
                    <head>
                        <title>Projet Web</title>
                        <style>
                            
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f0f0f0;
                                margin: 0;
                                padding: 0;
                            }
                            
                            header {
                                background-color: #459496;
                                color: #fff;
                                text-align: center;
                                padding: 10px;
                                position: sticky;
                                top: 0;
                                z-index: 10;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                            }
                            
                            header h1 {
                                font-size: 3em;
                                margin-top: 5px;
                                margin-bottom: 0px;
                            }
                            
                            main {
                                max-width: 800px;
                                margin: 20px auto;
                                padding: 20px;
                                background-color: #fff;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                            }
                            
                            h1, h4 {
                                text-align: center;
                            }
                            
                            #titre {
                                text-decoration: none;
                                color: white;
                            }
                            
                            p {
                                text-align: center;
                            }
                            
                            button{
                                
                            }
                            
                            /* Touites */
                            
                            .touiteCourt {
                                display: flex;
                                flex-direction: column;
                                padding: 10px;
                                margin: 10px;
                                border: 1px solid black;
                                background-color: #459496;
                                color: #fff;
                                border-radius: 5px;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            }
                            
                            .lien-auteur {
                                white-space: nowrap;
                                width: min-content;
                                text-decoration: none;
                                color: white;
                                transition: all 0.3s ease;
                            }
                            
                            .touite-clickable {
                                text-decoration: none;
                                background-color: white;
                                margin: 10px;
                                border: 1px solid black;
                                border-radius: 5px;
                            }
                            
                            .touite {
                                display: flex;
                                flex-direction: column;
                                padding: 10px;
                                margin: 10px;
                                border: 1px solid black;
                                background-color: #459496;
                                color: #fff;
                                border-radius: 5px;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            }
                            
                            .lien-auteur:hover {
                                transform: scale(1.05);
                            }
                            
                            .touiteCourt:hover {
                                transform: scale(1.02);
                            }
                            
                            .touiteCourt:active {
                                transform: scale(0.95);
                            }
                            
                            .corpsTouite {
                                color: black;
                                padding: 5px;
                            }
                            .corpsTouite-long{
                            overflow-wrap: break-word;
                            }
                            
                            /* Fin Touites */
                            
                            /* Boutons pour la pagination */
                            .bouton-pagination {
                                display: flex;
                                flex-direction: row;
                                justify-content: space-between;
                            }
                            
                            .boutton-paginer, .bouton-publier-touite {
                                text-decoration: none;
                                color: black;
                                background-color: white;
                                margin: 2px;
                                padding: 4px;
                                border: 5px solid #459496;
                                border-radius: 5px;
                                transition: all 0.3s ease;
                            }
                            
                            .boutton-paginer:hover {
                                transform: scale(1.1);
                            }
                            
                            .boutton-paginer:active {
                                transform: scale(0.9);
                            }
                            
                            .bouton-publier-touite:hover {
                                background-color: #ffffff;
                                border: 5px solid #459496;
                                color: #000;
                                transform: scale(1.1);
                                
                            }
                            
                            .bouton-publier-touite:active {
                                transform: scale(0.9);
                            }
                            
                            /* Fin Boutons pour la pagination */
                            
                            /* je sais pas si c'est utilisé dans un autre endroit que dans l'accueil alors je le garde au cas où
                            button {
                                background-color: #f0f0f0;
                                color: #000000;
                                font-size: 20px;
                                border: none;
                                transition: all 0.3s ease;
                                border-radius: 5px;
                                padding: 10px 20px;
                                display: block;
                                margin: 0 auto;
                                text-decoration: none;
                            }
                            */
                            
                            button {
                                text-decoration: none;
                                font-size: 15px;
                                color: #ffffff;
                                padding: 10px 20px;
                                margin-top: 10px;
                                border: 3px solid #ffffff;
                                border-radius: 5px;
                                background-color: #459496;
                                transition: all 0.3s ease;
                            }
                            
                            button:hover {
                                background-color: #ffffff;
                                border: 3px solid #ffffff;
                                color: #000;
                            }
                            
                            button:active {
                                transform: scale(0.9);
                            }
                            
                            header p {
                                margin: 10px;
                            }
                            
                            .liste-followers{
                                background-color: red;
                            }
                            
                            /* MENU HEADER */
                            
                            .menu-box {
                                display: flex;
                                justify-content: center;
                                border: 1px none #ccc;
                                border-radius: 5px;
                                padding: 10px;
                                margin: 20px 0;
                            }
                            
                            /* Styles pour les éléments du menu */
                            .menu-box p {
                                margin-top: 0;
                                margin-bottom: 0;
                                text-align: center;
                            }
                            
                            
                            .menu-box a {
                                text-decoration: none;
                                color: #ffffff;
                                padding: 10px 20px;
                                border: 3px solid #ffffff;
                                border-radius: 5px;
                                background-color: #459496;
                                transition: all 0.3s ease;
                            }
                            
                            .menu-box a:hover {
                                background-color: #ffffff;
                                border: 3px solid #ffffff;
                                color: #000;
                            }
                            
                            /* FIN MENU HEADER */
                            
                            /* Menu déroulant */
                            
                            .dropbtn{
                                margin-top: -12px;
                                margin-left: 10px;
                            }
                            
                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #459496;
                                min-width: 160px;
                                box-shadow: 0 8px 16px rgba(0,0,0,0.2);
                                z-index: 1;
                                border-radius: 5px;
                            }
                            
                            .dropdown:hover .dropdown-content {
                                display: flex;
                                flex-direction: column;
                            }
                            
                            .dropdown:hover .dropdown-content p {
                                display: flex;
                                flex-direction: column;
                                margin: 10px;
                                
                            }
                            
                            /* FIN Menu déroulant */

                            
                        </style>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale =1.0">
                        <!--<link rel="stylesheet" href="$css">-->
                    </head>
                    <body>
                        <header>
                            <h1><a href="?action=default" id="titre">Touiteur</a></h1>
                            <div class="menu-box">
                                <p><a href="?">Accueil</a></p>
                                <p><a href="?action=signup">Inscription</a></p>
                                <p><a href="?action=publier-touite">Touiter</a></p>
                                <p><a href="?action=signin">Se connecter</a></p>
                                <p><a href="?action=afficher-liste-touite-paginer">Touites paginés</a></p>
                                <div class="dropdown">
                                    <button class="dropbtn">Menu</button>
                                    <div class="dropdown-content">
                                        <p><a href="?action=signup">Inscription</a></p>
                                        <p><a href="?action=publier-touite">Touiter</a></p>
                                        <p><a href="?action=signin">Se connecter</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </header>
                        <main>
                            $html
                        </main>
                    </body>
                        
                    <!--<link rel="stylesheet" type="text/css" href="../../css/index.css">-->
                </html>
END;
    }
}