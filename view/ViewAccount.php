<?php

namespace View;

class ViewAccount extends View{
    private ?string $deleteMessage;
    private ?string $updateMessage;

    public function setDeleteMessage(string $message){
        $this->deleteMessage=$message;
    }

    public function setUpdateMessage(string $message){
        $this->updateMessage=$message;
    }

    public function launchBuffer():self{
    $data=$this->getData();
        ob_start();
?>
            <main>
                <h1>Mon compte</h1>
                <h2>Pseudo : <?= $data["pseudo"] ?></h2>
                <p>email : <?= $data["email"] ?></p>
                <p>Role : <?= $data["role"] ?></p>
                <form action="" method="post">
                    <input type="submit" name="updateAccount" value="Modifier mon compte">
                    <?php if(isset($_POST["updateAccount"])) : ?>
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" name="pseudo">
                    <label for="email">Email : </label>
                    <input type="email" name="email">
                    <label for="password">Mot de passe actuel : </label>
                    <input type="password" name="password">
                    <label for="newPassword">Nouveau mot de passe : </label>
                    <input type="password" name="newPassword">
                    <label for="newPasswordConfirm">Confirmer le nouveau mot de passe : </label>
                    <input type="password" name="newPasswordConfirm">
                    <input type="submit" name="update"value="Enregistrer mes informations">
                    <?php endif ?>
                    <p> <?php $this->updateMessage ??"" ?> </p>
                </form>
                <form action="" method="post">
                    <input type="submit" name="delete" id="delete" value="Supprimer mon compte">
                    <?php if(isset($_POST["delete"])) : ?>
                    <label for="email">Confirmer votre email : </label>
                    <input type="email" name="email">
                    <label for="password">Confirmer votre mot de passe : </label>
                    <input type="password" name="password">
                    <input type="submit" name="deleteConfirm"value="Confirmer la suppression du compte">
                    <?php endif ?>
                    <p> <?php $this->deleteMessage ??"" ?> </p>
                </form>
            </main>
<?php
        //Récupération du buffer dans la propriété $this->buffer
        $buffer = ob_get_clean();
        $this->setBuffer($buffer);
        return $this;
    }
}