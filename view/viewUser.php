<?php
//Déclaration de ma variable d'affichage
class ViewUser{

    private string $listeUsers;
    private array $dataUsers;
    private ViewHeader $header;

    public function __construct(string $listeUsers,array $dataUsers)
    {
        $this->listeUsers=$listeUsers;
        $this->dataUsers=$dataUsers;
        
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
        $header=new ViewHeader("Utilisateurs");
        $header->display();
        $this->display();
        $footer=new ViewFooter();
        $footer->display();
    }
}
