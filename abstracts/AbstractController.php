<?php

include "./views/InterfaceView.php";
include "./models/AbstractModel.php";

abstract class AbstractController{
    /** 
        * @param AbstractModel[] 
    */
    private array $listModel;
    /** 
        * @param InterfaceView[] 
    */
    private array $listView;
    abstract public function render():void;
    function getListModel():array{
        return $this->listModel;
    }
    function setListModel(array $newListModel):self{
        $this->listModel = $newListModel;
        return $this;
    }
    function renderHeader():void{

    }
    function renderFooter():void{
        
    }
}