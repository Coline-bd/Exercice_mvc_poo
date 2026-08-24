<?php

class ModelArticle{
    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?DateTime $created_at;
    private ?DateTime $edited_at;
    private ?int $user_id;
    private pdo $bdd;

    public function __construct(pdo $bdd)
    {
        $this->bdd=$bdd;
    }
    public function getArticles(){
        try{
            $bdd = connect();
            //1. Preparer la requête
            $request = 'SELECT a.title, a.content, a.created_at, a.edited_at, u.pseudo FROM article a INNER JOIN user u ON u.id = a.user_id';

            $req = $this->bdd->prepare($request);

            //2. Exécution de la requête
            $req->execute();

            //3. Retourner les données
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
}
 