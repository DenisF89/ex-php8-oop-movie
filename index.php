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
    public array $generi;

    function __construct($_nome, $_regista, $_anno, array $_generi){
        $this->nome = $_nome;
        $this->regista = $_regista;
        $this->anno = $_anno;
        $this->generi = $_generi;
    }

    public function isRecent(): bool {
        return $this->anno > 2020;
    }

}

$drammatico = new Genre("Drammatico");
$action = new Genre("Action");
$romantico = new Genre("Romantico");

$titanic = new Movie("Titanic","James Cameron",1997, [$drammatico, $romantico]);
$pulpFiction = new Movie("Pulp Fiction","Quentin Tarantino",1992, [$action]);

$movies = [$titanic, $pulpFiction];

        
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

    foreach ($movies as $movie){

        echo "<h2>$movie->nome</h2>";
        echo "Regista: " . $movie->regista . "<br>";
        echo "Anno: " . $movie->anno . "<br>";
        
        $nomiGeneri = [];
        echo "Generi: ";
        foreach($movie->generi as $genere){
            $nomiGeneri[] = $genere->nome;
        }
        echo join(", ",$nomiGeneri);
    }

?>

</body>
</html>

