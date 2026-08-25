<?php

class ViewArticle{
    private string $listeArticle='';
    private array $dataArticle;
    private ViewHeader $header;
    private ViewFooter $footer;
    private ?string $buffer;

    public function __construct()
    {
        $this->footer = new ViewFooter();
        $this->header = new ViewHeader("Articles");
    }

    public function setDataArticles(array $Data){
        $this->dataArticle = $Data;
        
    }

    public function launchBuffer():self{
        ob_start();
        ?>
        <main>
        <h1>Liste des Articles</h1>
        <ul>
            <?php
                //traitement des données pour affichage 
                foreach($this->dataArticle as $row){
                    $this->listeArticle .="<article><h2>".$row['title']."</h2><h3>By :".$row['pseudo']."</h3></article>";
                };
                echo $this->listeArticle;
            ?>
        </ul>
    </main>
    <?php 

    $this->buffer=ob_get_clean();
    return $this;
    }

    public function display():void{
        echo $this->buffer;
    }

    public function displayAll():void{
        $this->header->launchBuffer()->display();
        $this->launchBuffer()->display();
        $this->footer->launchBuffer()->display();
    }
}

