<?php
//FICHIER D'EXECUTION, DONC IMPORT DE TOUTES LES RESSOURCES
session_start();

include './env.php';
include './utils/utils.php';
include './interfaces/InterfaceView.php';
include './abstracts/AbstractController.php';
include './views/ViewHeader.php';
include './views/ViewAccount.php';
include './views/ViewFooter.php';
include './controllers/AccountController.php';

$home = new AccountController(null,['header'=>new ViewHeader(),'footer'=> new ViewFooter()]);
$home->render();