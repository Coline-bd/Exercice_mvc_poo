<?php

namespace View;

class ViewAccount extends View{

    public function launchBuffer():self{
    $data=$this->getData();
        ob_start();
?>
            <main>
                <h1>Mon compte</h1>
                <h2>Pseudo : <?= $data["pseudo"] ?></h2>
                <p>email : <?= $data["email"] ?></p>
                <p>Role : <?= $data["role"] ?></p>
            </main>
<?php
        //Récupération du buffer dans la propriété $this->buffer
        $buffer = ob_get_clean();
        $this->setBuffer($buffer);
        return $this;
    }
}