<?php

abstract class AbstractModel{
    private InterfaceBDD $bdd;

    public function __construct(InterfaceBDD $bdd) {
        $this->bdd = $bdd;
    }
    abstract public function add():void;
    abstract public function update():void;
    abstract public function delete():void;
    abstract public function getAll():void;
    abstract public function getById():void;
}