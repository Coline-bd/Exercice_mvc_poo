<?php
//Déclaration de ma variable d'affichage
class ViewUser{

    private string $listeUsers="";
    private array $dataUsers;
    private ViewHeader $header;
    private ViewFooter $footer;
    private ?string $buffer;

    public function __construct(array $dataUsers,ViewHeader $header,ViewFooter $footer)
    {
        // $this->listeUsers=$listeUsers;
        $this->dataUsers=$dataUsers;
        $this->header=$header;
        $this->footer=$footer;

    }
    public function launchBuffer():self{
        ob_start();
        foreach($this->dataUsers as $row){
                    $this->listeUsers .="<li>Pseudo :".$row['pseudo']." - Email : ".$row['email']." - Role :".$row['role']."</li>";
                }; ?>
         <main>
        <h1>Liste des utilisateurs</h1>
        <ul><?= $this->listeUsers ?> 
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
