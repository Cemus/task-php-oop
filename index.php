<?php
//FICHIER D'EXECUTION, DONC IMPORT DE TOUTES LES RESSOURCES
session_start();

include './env.php';
include './utils/utils.php';
include './interfaces/InterfaceView.php';
include './interfaces/InterfaceBDD.php';
include './abstracts/AbstractModel.php';

include './models/ModelAccount.php';

include './abstracts/AbstractController.php';
include './views/ViewHeader.php';
include './views/ViewAccount.php';
include './views/ViewFooter.php';
include './controllers/AccountController.php';
include './utils/BDD.php';

$bdd = (new BDD())->connexion()->getBdd();

$home = new AccountController(
    ["account" => new ModelAccount($bdd)], 
    ['header' => new ViewHeader(), 'footer' => new ViewFooter()]
);
$home->render();