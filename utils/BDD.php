<?php

/**
 * @return PDO
 */


class BDD implements InterfaceBDD{
    private PDO $bdd;

    public function connexion(): self{
        $pdo = new PDO(
            'mysql:host=' . $_ENV["URL_BDD"] . ';dbname=' . $_ENV["NAME_BDD"],
            $_ENV["LOGIN_BDD"],
            $_ENV["PASSWORD_BDD"],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $this->setBdd($pdo);
        return $this;
    }


    public function getBdd(): PDO {
        return $this->bdd;
    }

    public function setBdd(PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}

