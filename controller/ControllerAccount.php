<?php

namespace Controller;

use Utils\Utils;

class ControllerAccount extends Controller{
    
    public function render():void{
        if (empty($_SESSION["id"])){
            header('Location: /MVC/');
            exit;
        }
        else{
            $this->getView()->setData($_SESSION)->displayAll();
        }
    }

    public function deleteAccount(){
        if(isset($_POST["deleteConfirm"])){
            if(empty($_POST["email"]) || empty($_POST["password"])){
                $this->getView()->setDeleteMessage("Veuillez remplir tous les champs.");
                return;
            }
            //Vérification du format d'email
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                $this->getView()->setDeleteMessage('Email pas au bon format');
                return;
            }
            //Nettoyer mes datas
            $email = Utils::sanitize($_POST['email']);
            $this->getModel()->setEmail($email);
            $password = Utils::sanitize($_POST['password']);
            $user_login=$this->getModel()->findByEMail($email);
            if (!$user_login){
                $this->getView()->setDeleteMessage("Identifiants incorrects");
                return;
            }
            if(!password_verify($password,$user_login["password"])){
                $this->getView()->setDeleteMessage("Identifiants incorrects");
                return;
            }
            $this->getModel()->setId($_SESSION["id"]);
            $this->getModel()->delete();
            session_destroy();
            header('Location: /MVC/');
            exit;
        }
    }

    public function updateAccount(){
        //1. Vérifier que l'on reçoive le formulaire de connexion
        if(isset($_POST['updateConfirm'])){
            
            //2. Vérifier les champs : champs vide, format des données, nettoyage
            if(empty($_POST['email']) && empty($_POST['pseudo']) && empty($_POST['newPassword']) && empty($_POST['newPasswordConfirm'])){
                $this->getView()->setUpdateMessage('Aucune modification renseignée. Veuillez remplir des champs');
                return;
            }
            if(empty($_POST["password"])){
                $this->getView()->setUpdateMessage('Veuillez renseigner votre mot de passe actuel');
                return;
            }
            //Nettoyer les datas
            // $password = Utils::sanitize($_POST['password']);
            $newPassword=Utils::sanitize($_POST['newPassword']);
            $newPasswordConfirm=Utils::sanitize($_POST['NewPasswordConfirm']);
            $pseudo=Utils::sanitize($_POST['pseudo']);
            $email=Utils::sanitize($_POST['email']);

            //récupération des infos
            $this->getModel()->setId($_SESSION["id"]);
            $this->getModel()->setEmail($_SESSION["email"]);
            $this->getModel()->setPseudo($_SESSION["pseudo"]);
            $user=$this->getModel()->findByPseudo();
            $this->getModel()->setPassword($user["password"]);

            //modification du mail
            if(isset($_POST["email"])){
                //Vérification du format d'email
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $this->getView()->setUpdateMessage('Email pas au bon format');
                    return;
                }

                $this->getModel()->setEmail($email);

                if (($this->getModel()->findByEmail())){
                $this->getView()->setUpdateMessage("L'email existe déjà");
                return;
                }
            }

            if(isset($_POST["pseudo"])){
                $this->getModel()->setPseudo($pseudo);
                if (($this->getModel()->findByPseudo())){
                    $this->getView()->setUpdateMessage("Le pseudo existe déjà");
                return;
            }
            }
            //Modification de mot de passe
            if(isset($_POST["newPassord"])){
                if(!isset($_POST["newPasswordConfirm"])){
                    $this->getView()->setUpdateMessage("Veuillez confirmer le nouveau mot de passe");
                return;
                }
                // Vérifier si les 2 nouveaux mots de passes correspondent
                if($newPassword!==$newPasswordConfirm){
                    $this->getView()->setUpdateMessage("Les nouveaux mots de passe ne sont pas identiques");
                return;
                }
            }
            
            $this->getModel()->setPassword($newPassword);
            
            
            //Récupérer le mot de passe
            $user_login=$this->getModel()->findByEMail();
            //Vérifier le mot de passe actuel
            if(!password_verify($password,$user_login["password"])){
                $this->getView()->setUpdateMessage("Mot de passe incorrect");
                return;
            }

            
            // Enregistrer l'utilisateur en BDD grâce à la méthode addUser()
            $this->getModel()->update();
            $_SESSION["pseudo"]=$pseudo;
            $_SESSION["email"]=$email;
            // Afficher un message de confirmation
            $this->getView()->setUpdateMessage("Modifications confirmées");
                return;
        }            
    }
}
