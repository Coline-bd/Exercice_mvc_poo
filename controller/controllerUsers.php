<?php
//CONTROLLER

class ControllerUsers
{
    private ModelUser $model;
    private ViewUser $view;

    public function __construct(ModelUser $model){
        $this->model = $model ;

    }
    
    public function render(){
        //Appel du model pour récupération des données
        $data = $this->model->findAll();

        //Appel de la view pour effectuer l'affichage
        $view=new ViewUser("",$data);

        $view->displayAll();
    }

}


// function displayUsers(){
//     //Creation d'un objet ModelUser
//     $modelUser = new ModelUser(connect());

//     //Appel du model pour récupération des données
//     $data = $modelUser->findAll();

//     //Appel de la view pour effectuer l'affichage
//     $title = "Mes Utilisateurs";
//     include('./view/viewHeader.php');
//     include('./view/viewUser.php');
//     include('./view/viewFooter.php');
// }
