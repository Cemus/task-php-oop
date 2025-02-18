<?php


class ViewHeader implements InterfaceView{
    private string $nav;

    
    public function __construct(?string $nav = "") {
        $this->nav = $nav;
    }

    public function displayView():string{
        ob_start();

        ?>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ajouter une categorie</title>
        </head>
        <body>
        <header>
        <nav>
            <a href="/">Accueil</a>
            <?php echo $this->getNav() ?>
        </nav>
        </header>
        <?php
        
        return ob_get_clean();
    }
    public function getNav():string{
        return $this->nav;
    }
    public function setNav(string $newNav):self{
        $this->nav = $newNav;
        return $this;
    }
}