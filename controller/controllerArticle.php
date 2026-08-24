<?php

class ControllerArticle{
    private ModelArticle $model;
    private ViewArticle $view;

    public function __construct(ModelArticle $model, ViewArticle $view)
    {
        $this->model=$model;
        $this->view=$view;
    }

    public function render(){
        $data =$this->model->getArticles();
        $this->view->setDataArticles($data);
        $this->view->displayAll();
    }
}

