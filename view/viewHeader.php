<?php

class ViewHeader
{
    private string $title;
    private ?string $buffer;

    public function __construct(string $title){
        $this->title=$title;
    }

    public function launchBuffer():self{
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $this->title ?></title>
        </head>
        <body>
            <header>
                <nav>
                    <a href=<?php echo $_ENV['utilisateurs'] ?>>Utilisateurs</a>
                    <a href=<?php echo $_ENV['articles'] ?>>Articles</a>
                </nav>
            </header>
<?php

    $this->buffer = ob_get_clean();
    return $this;
    }
    
    public function display():void{
    echo $this->buffer;
}
}