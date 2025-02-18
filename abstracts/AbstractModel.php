<?php

abstract class AbstractModel{
    private InterfaceBDD $bdd;

    public function __construct(InterfaceBDD $bdd) {
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
     * @return InterfaceBDD
     */
    public function getBdd(): InterfaceBDD {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @param InterfaceBDD $bdd
     *
     * @return self
     */
    public function setBdd(InterfaceBDD $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}