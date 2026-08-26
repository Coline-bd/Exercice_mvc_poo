<?php

namespace View;

class View{
    private ?array $data;
    private ViewFooter $viewFooter;
    private ViewHeader $viewHeader;
    private ?string $buffer; 

    public function __construct(){
        $this->viewFooter = new ViewFooter();
        $this->viewHeader = new ViewHeader("Articles","./public/src/script/scriptArticle.js");
    }

    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    public function setBuffer(string $newBuffer){
        $this->buffer=$newBuffer;
    }

    public function getData(){
        return $this->data;
    }


    public function display(){
        echo $this->buffer;
    }

    //Method pour recomposer l'entièreté de la page
    public function displayAll():void{
        $this->viewHeader->launchBuffer()->display();
        $this->display();
        $this->viewFooter->launchBuffer()->display();
    }

}