<?php

class ViewArticle{
    private string $listeArticle='';
    private array $dataArticle;
    private ViewHeader $header;
    private ViewFooter $footer;

    public function setDataArticles(array $Data){
        $this->dataArticle = $Data;
        $this->footer = new ViewFooter();
        $this->header = new ViewHeader("Articles");
    }

    public function display():void{
        foreach($this->dataArticle as $row){
            $this->listeArticle .="<article><h2>".$row['title']."</h2><h3>By :".$row['pseudo']."</h3></article>";
        };
        echo "<main>
        <h1>Liste des Articles</h1>
        <ul>
            ".$this->listeArticle."
        </ul>
    </main>
        ";
    }

    public function displayAll():void{
        $this->header->display();
        $this->display();
        $this->footer->display();
    }
}

