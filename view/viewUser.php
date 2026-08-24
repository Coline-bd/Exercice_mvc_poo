<?php
//Déclaration de ma variable d'affichage
class ViewUser{

    private string $listeUsers="";
    private array $dataUsers;
    private ViewHeader $header;
    private ViewFooter $footer;

    public function __construct(array $dataUsers,ViewHeader $header,ViewFooter $footer)
    {
        // $this->listeUsers=$listeUsers;
        $this->dataUsers=$dataUsers;
        $this->header=$header;
        $this->footer=$footer;

    }

    public function display():void{
        foreach($this->dataUsers as $row){
                    $this->listeUsers .="<li>Pseudo :".$row['pseudo']." - Email : ".$row['email']." - Role :".$row['role']."</li>";
                };
        echo '<main>
        <h1>Liste des utilisateurs</h1>
        <ul>'. $this->listeUsers.'
        </ul>
    </main>';
    }
    
    public function displayAll():void{
        $this->header->display();
        $this->display();
        $this->footer->display();
    }
}
