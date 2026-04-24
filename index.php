<?php

//importo classi e traits
require_once './Traits/HasGenres.php';
require_once './Models/Genre.php';
require_once './Models/Movie.php';

//importo dati json
$string = file_get_contents('./data/movies.json');
$data = json_decode($string, true);

//inizializzo array film e generi
$movies = [];
$genres = [];

//per ogni film creo una istanza di Movie che contiene istanze di Genre
foreach ($data as $movie){

    $moviegenres= [];

    foreach ($movie['genre'] as $genre ){           
        if (!isset($genres[$genre])) {              //evito duplicati nell'array genres        
            $genres[$genre] = new Genre($genre);    //se non esiste già il genere creo nuova istanza di Genre
        }
        $moviegenres[] = $genres[$genre];
    }

    $movies[] = new Movie(  //creo nuova istanza di Movie
        $movie['title'],
        $movie['director'],
        $movie['coverurl'],
        $movie['year'],
        $moviegenres        //array di oggetti di classe Genre
        );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP-MOVIE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark text-light">

    <div class="container text-center py-4">
            <h1>OOP Movies</h1>
    </div>
    <div class="container boxed">
        <div class="row row-cols-1 row-cols-md-5 g-2">

            <?php foreach ($movies as $movie) { ?>
                <div class="col">
                    <div class="card h-100 bg-secondary text-light border-3">
                        <div class="card-header p-0">
                            <img 
                                src="<?= $movie->locandina; ?>" 
                                alt="<?= $movie->titolo; ?>" 
                                class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;"
                            >
                        </div>
                        <div class="card-body">
                            <h2 class="card-title fs-6"><?= $movie->titolo; ?></h2>
                            <div class="card-text fs-6"><b>Regista:</b> <?= $movie->regista; ?></div>
                            <div class="card-text fs-6"><b>Anno:</b> <?= $movie->anno; ?></div>
                            <div class="card-text fs-6"><?= $movie->getGenres(); /* metodo del trait HasGenres */ ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?> 

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

