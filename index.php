<?php

//importo classi e traits
require_once './Traits/HasGenres.php';
require_once './Models/Genre.php';
require_once './Models/Movie.php';


session_start();
if(isset($_POST['logout'])){
    session_destroy();
       header("Location: index.php");
    exit;
}



//CREO ARRAY DI FILM E GENERI

//--- 1°METODO: FILE JSON:ARRAY DI OGGETTI ---//
$metodo = "1° METODO: JSON-ARRAY DI OGGETTI";
//importo dati json
$string = file_get_contents('./data/movies.json');
$data = json_decode($string, true);

//--- 2°METODO: FILE PHP:ARRAY DI ARRAY ---//
//importo dati php

/* ATTIVA/DISATTIVA --> */require_once './data/db.php';

//--- CICLO PER 1° e 2° METODO ---//
require_once './functions/cicle.php';

if (!isset($_SESSION['movies'])) {
    ['movies' => $movies, 'genres' => $genres] = cicle($data);

//--- 3°METODO: FILE PHP:ARRAY DI ISTANZE ---// 
/* ATTIVA/DISATTIVA --> *///require_once './data/istances.php';

    $_SESSION['movies'] = $movies;
    $_SESSION['genres'] = $genres;
} else {
    $metodo = ' <form method="POST">
                <label>SESSIONE ATTIVA</label><br>
                <button type="submit" name="logout">Reset sessione</button>
                </form>';
    $movies = $_SESSION['movies'];
    $genres = $_SESSION['genres'];
}

//var_dump($movies);
//var_dump($genres);

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
            <h6><?=$metodo?></h6>
    </div>
    <div class="container boxed">

        <form class="row row-cols g-3 align-items-center my-1" method="GET">

            <div class="col-3">
                <input type="checkbox" id="recent" name="recent" value="1"
                <?php echo (isset($_GET['recent'])? 'checked':''); ?> >
                <label for="recent">Mostra solo film recenti</label>
            </div>

            <div class="col-3">
                <select class="form-select" id="genre" name="genre">
                    <option selected value="">Scegli un genere</option>
                    <?php foreach ($genres as $genre){
                        $value = $genre->getName();                                     
                        $selected = (isset($_GET['genre']) && $_GET['genre'] === $value) ? "selected" : "";
                        echo "<option $selected value=$value>$value</option>";
                        }?>
                </select>
            </div>

            <div class="col-3">
                <button class="btn btn-primary" type="submit">Filtra</button>
            </div>

        </form>

        <div class="row row-cols-1 row-cols-md-5 g-2 my-4">

            <?php 
            //CICLO PER STAMPARE MOVIE

                foreach ($movies as $n=>$movie) { 

                //FILTRI
                
                if(!$movie->isRecent() && isset($_GET['recent'])) {continue;}       //se checkbox checked non mostrare i film piu vecchi del 2000

                if(isset($_GET['genre']) && $_GET['genre'] != ''){          //se è settato un filtro genere
                                                                            //trasformo l'array di oggetti(Genre) in array di stringhe
                    $nomi = array_map(                                      //array_map fa un ciclo di operazioni su array e restituisce un nuovo array
                        fn($genere) => $genere->getName(),                  //callback che restituisce il nome del genere; fn = arrow function anonima
                        $movie->generi                                      //array su cui cicla
                        );
                    if (!in_array($_GET['genre'], $nomi, true)) {continue;}       //se il filtro non corrisponde a nessun genere del film, non mostrarlo
                } 

            ?>
                <div class="col">
                    <div class="card h-100 bg-secondary text-light border-3">
                        <div class="card-header p-0">
                            <a href="single.php?id=<?= $n ?>">
                            <img 
                                src="<?= $movie->locandina; ?>" 
                                alt="<?= $movie->titolo; ?>" 
                                class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;"
                            ></a>
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

