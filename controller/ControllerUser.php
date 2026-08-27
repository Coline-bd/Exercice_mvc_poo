<?php
//CONTROLLER
//Indication de l'espace de nom possédant la class ControllerUser
namespace Controller;

/*Bonne pratique des namespaces :
- utiliser un namespace identique au nom du dossier
- La première lettre de chaque lettre d'un namespace commence par une Majuscule
=> le nom du dossier doit commencer par une Majuscule
- Le nom du fichier doit être identique au nom de la class, majuscule comprise
*/

use Model\ModelUser;
use View\ViewUser;

class ControllerUser extends Controller{
    //ATTRIBUTS
    private ?string $titre;
    
    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setTitre(string $newTitre):self{
        $this->titre = $newTitre;
        return $this;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function seConnecter()
    {
        if(isset($_POST["submit"])){
            //Si tous les champs sont remplis
            if (!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
                //si le format du mail est correct
                if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    //nettoyage des données
                    $pseudo=trim($_POST["pseudo"]);
                    $email=trim($_POST["email"]);
                    $password=trim($_POST["password"]);
                    $this->getModel()->setEmail($email);
                    $user_login=$this->getModel()->findByEMail();
                    var_dump($user_login);
                    if (!$user_login){
                        $this->getView()->setConnexion("Le compte n'existe pas");
                    }
                    else{
                        if(password_verify($password,$user_login["password"])){
                            //SESSION son id, son pseudo, son email, son createdAt et son role
                            $_SESSION["id"]=$user_login["id"];
                            $_SESSION["pseudo"]=$user_login["pseudo"];
                            $_SESSION["email"]=$user_login["email"];
                            $_SESSION["created_at"]=$user_login["created_at"];
                            $_SESSION["role"]=$user_login["role"];
                            $this->getView()->setConnexion("Connexion réussie");
                        }
                        else{
                            $this->getView()->setConnexion("Mot de passe incorrect");
                        }
                        
                    }
                }
                else{
                    $this->getView()->setConnexion("Le format de l'email est incorrect");
                }
            }
            else{
                $this->getView()->setConnexion("Veuillez remplir tous les champs");
            }
        }
    }
    /**
     * Get the value of modelUser
     *
     * @return ModelUser
     */
    // public function getModelUser(): ModelUser {
    //     return $this->modelUser;
    // }

    // /**
    //  * Set the value of modelUser
    //  *
    //  * @param ModelUser $modelUser
    //  *
    //  * @return self
    //  */
    // public function setModelUser(ModelUser $modelUser): self {
    //     $this->modelUser = $modelUser;
    //     return $this;
    // }

    // /**
    //  * Get the value of viewUser
    //  *
    //  * @return ?ViewUser
    //  */
    // public function getViewUser(): ?ViewUser {
    //     return $this->viewUser;
    // }

    // /**
    //  * Set the value of viewUser
    //  *
    //  * @param ?ViewUser $viewUser
    //  *
    //  * @return self
    //  */
    // public function setViewUser(?ViewUser $viewUser): self {
    //     $this->viewUser = $viewUser;
    //     return $this;
    // }

    //METHODS
    
}
