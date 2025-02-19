<?php

abstract class AbstractModel{
    private PDO $bdd;

    public function __construct(PDO $bdd) {
        $this->bdd = $bdd;
    }
    abstract public function add():void;
    abstract public function update():void;
    abstract public function delete():void;
    abstract public function getAll():array|null;
    abstract public function getById():array|null;

    

    /**
     * Get the value of bdd
     *
     * @return PDO
     */
    public function getBdd(): PDO {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @param PDO $bdd
     *
     * @return self
     */
    public function setBdd(PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}