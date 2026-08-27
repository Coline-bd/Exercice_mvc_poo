<?php

namespace Controller;

class ControllerAccount extends Controller{
    
    public function render():void{
        //2.Passage des data à la View et son Appel pour afficher les data traitées
        $this->getView()->setData($_SESSION)->displayAll();
    }
}