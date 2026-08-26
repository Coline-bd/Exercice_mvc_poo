<?php
namespace View;
use View\View;

class ViewArticle extends View{
    //ATTRIBUT

    //CONSTRUCTOR
    
    //GETTER ET SETTER
    // Le Controlleur a besoin de cette méthode public pour donner les data des articles depuis le Model à la View
    // public function setData(array $newArticles):self{
    //     $this->data = $newArticles;
    //     return $this; //return $this (l'objet en cours) est pratique pour utiliser du chaînage de méthode
    // }

    //METHODS
    //Methode pour mettre le code HTML en mémoire tampon
    public function launchBuffer():self{
        $data=$this->getData();
        //Lancement de la mise en mémoire tampon
        ob_start();
?>
            <main>
                <h1>Liste des Articles</h1>
                <ul>
<?php
                    //Boucle d'affichage du tableau de donnée des articles au sein du template HTML
                    foreach($data as $row){
?>
                        <article>
                            <h2> <?= $row['title'] ?></h2>
                            <h3>By : <?= $row['pseudo'] ?></h3>
                        </article>
<?php
                    }
?>
                </ul>
            </main>
<?php
        //Récupération du Buffer et nettoyage de ce dernier
        $buffer = ob_get_clean();
        $this->setBuffer($buffer);

        //Retour de l'objet pour permettre le chaînage de méthode
        return $this;
    }

    //MEthod pour afficher uniquement le HTML dédié à cette view
    
}


?>
