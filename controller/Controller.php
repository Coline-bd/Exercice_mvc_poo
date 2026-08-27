<?php

namespace Controller;
use Model\Model;
use View\View;

class Controller {
    private Model $model;
    private View $view;

    public function __construct(Model $model, $view){
        $this->model = $model;
        $this->view = $view;
    }
    public function getView(){
        return $this->view;
    }

    public function getModel(){
        return $this->model;
    }
    public function render():void{
        //1. Appel du model pour récupérer les données 
        $data = $this->model->findAll();

        //2.Passage des data à la View et son Appel pour afficher les data traitées
        $this->view->setData($data)->displayAll();
    }


}