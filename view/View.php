<?php

namespace View;

class View{
    private ?array $data;
    private ViewFooter $viewFooter;
    private ViewHeader $viewHeader;
    private ?string $buffer; 

    public function __construct(string $title,string $script){
        $this->viewFooter = new ViewFooter();
        $this->viewHeader = new ViewHeader($title,$script);
    }

    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    protected function setBuffer(string $newBuffer){
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
        $this->launchBuffer()->display();
        $this->viewFooter->launchBuffer()->display();
    }

}