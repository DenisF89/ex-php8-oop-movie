<?php

class Genre {
    public $nome;

    function __construct($_nome){
        $this->nome = $_nome;
    }

    public function getName(): string {
        return $this->nome;
    }
}

class Movie {

    public $nome;
    public $regista;
    public $anno;
    public Genre $genere;

    function __construct($_nome, $_regista, $_anno, Genre $_genere){
        $this->nome = $_nome;
        $this->regista = $_regista;
        $this->anno = $_anno;
        $this->genere = $_genere;
    }

    public function isRecent(): bool {
        return $this->anno > 2020;
    }

}

$drammatico = new Genre("Drammatico");
$action = new Genre("Action");

$titanic = new Movie("Titanic","James Cameron",1997, $drammatico);
$pulpFiction = new Movie("Pulp Fiction","Quentin Tarantino",1992, $action);
        
//var_dump ($titanic);
//var_dump ($pulpFiction);
//var_dump ($titanic->isRecent());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP-MOVIE</title>
</head>
<body>

<?php
    echo "<h1> OOP-Movie </h1>";

    echo "<h2>$titanic->nome</h2>";
    echo "Regista: " . $titanic->regista . "<br>";
    echo "Anno: " . $titanic->anno . "<br>";
    echo "Genere: " . $titanic->genere->nome . "<br>";


    echo "<h2>$pulpFiction->nome</h2>";
    echo "Regista: " . $pulpFiction->regista . "<br>";
    echo "Anno: " . $pulpFiction->anno . "<br>";
    echo "Genere: " . $pulpFiction->genere->nome . "<br>";

?>

</body>
</html>

