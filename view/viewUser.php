<?php
namespace View;
use View\View;

class ViewUser extends View{
    //ATTRIBUT
    //private string $listUsers = '';
    private ?string $connexion="";
    private ?string $signUp="";
    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setConnexion(string $is_connected){
        $this->connexion=$is_connected;
    }
    public function setSignUp(string $message){
        $this->signUp=$message;
    }
    //METHODS
    //Mise en mémoire tampon
    public function launchBuffer():self{
        //1. traitement des données pour affichage 
        // foreach($this->dataUsers as $row){
        //         $this->listUsers .="<li>Pseudo :".$row['pseudo']." - Email : ".$row['email']." - Role :".$row['role']."</li>";
        // };
    $data=$this->getData();
        ob_start();
?>
            <main>
                <h1>Liste des utilisateurs</h1>
                <ul>
<?php  
                // inclusion de la boucle foreach effectuer en 1. (plus haut) au sein du template HTML mis en buffer
                foreach($data as $row){
?>
                    <li>Pseudo : <?= $row['pseudo'] ?> - Email : <?= $row['email'] ?> - Role : <?= $row['role'] ?></li>
<?php    
                }
?>
                </ul>
                <h2>Inscription</h2>
                <form action="" method="post">
                <label for="pseudo">Pseudo : </label>
                    <input type="text" name="pseudo">
                    <label for="email">Adresse email : </label>
                    <input type="email" name="email">
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" >
                    <label for="passwordCheck">Confirmation du mot de passe : </label>
                    <input type="password" name="passwordCheck" >
                    <input type="submit" name="signUp" value="s'inscrire">
                    <p> <?= $this->signUp ?></p>
                </form>
                <h2>Connexion</h2>
                <form action="" method="post">
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" name="pseudo">
                    <label for="email">Adresse email : </label>
                    <input type="email" name="email">
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" >
                    <input type="submit" name="submit" value="se connecter">
                    <p><?= $this->connexion ?></p>
                </form>
            </main>
<?php
        //Récupération du buffer dans la propriété $this->buffer
        
        $buffer = ob_get_clean();
        $this->setBuffer($buffer);
        return $this;
    }
   
}
