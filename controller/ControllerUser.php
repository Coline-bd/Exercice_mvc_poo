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
