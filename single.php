<?php

//importo classi e traits
require_once './Traits/HasGenres.php';
require_once './Models/Genre.php';
require_once './Models/Movie.php';
require_once './Models/Sequel.php';
include_once './data/db.php';
include_once './functions/cicle.php';


session_start();

$id = $_GET['id'] ?? header("Location: index.php"); //se non esiste id torna alla home

//Se non esiste la sessione creo gi array di istanze(movies e genres) e li salvo in sessione
if (!isset($_SESSION['movies'], $_SESSION['genres'])) {
    ['movies' => $movies, 'genres' => $genres] = cicle($data);

    $_SESSION['movies'] = $movies;
    $_SESSION['genres'] = $genres;
}

//recupero gli array dalla sessione
$movies = $_SESSION['movies'];
$genres = $_SESSION['genres']; 


$movie = $movies[$id] ?? header("Location: index.php"); //se non esiste un movie all'indice torna alla home

if(isset($_POST['submit'])) //se il form è stato inviato
    {
        //assegna i valori passati alle proprietà dell'istanza 
        $movie->setTitle($_POST['title']);
        $movie->setDirector($_POST['director']);
        $movie->setImage($_POST['image']);
        $movie->setYear($_POST['year']);

        //controllo per i generi
        $array =    array_filter(                       //array_filter elimina le stringhe vuote
                    array_map('trim',                   //array_map cicla la funzione trim sull'array di stringhe togliendo spazi inizio e fine
                    explode(",", $_POST['genres'])));   //explode trasforma la stringa in array di stringhe divise da ","
        
        $newGenres = [];
        foreach($array as $genre){                      //ciclo l'array di stringhe
             if (!isset($genres[$genre])) {             //controllo se la stringa è già nell'array associativo dei generi
                $genres[$genre] = new Genre($genre);    //se non esiste creo nuovo genere e lo insersco nell'array
             }
            $newGenres[] = $genres[$genre];             //assegno il genere all'array dei generi del film
        }
        $movie->setGenres($newGenres);                    //assegno il nuovo array alla proprietà del film

        $movies[$id] = $movie;                          //aggiorno il film con le nuove proprietà
        $_SESSION['movies'] = $movies;                  //salvo in sessione l'array aggiornato dei film
        $_SESSION['genres'] = $genres;                  //salvo in sessione l'array aggiornato dei generi

        header("Location: index.php");         
        exit;
    }
    
    //getGenres restituisce una stringa "<b>Genere/i:</b> gen1, gen2, gen3..."
    //la divido in "<b>Genere/i:</b>" e "gen1,gen2,gen3..."
    $string = $movie->getString(); 
    $pos = strpos($string, "</b>");     //posizione del primo carattere della stringa cercata
    $titolo = substr($string,0,$pos+4); //prendi porzione stringa,inizio,[fine]
    $generi = substr($string,$pos+4);
                                
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

    <div class="container single">
        <form class="row" action="" method="post">
                <div class="col">
                    <div class="card h-100 bg-secondary text-light border-3">
                        <div class="card-header p-0">
                            <img 
                                src="<?= $movie->getImage(); ?>" 
                                alt="<?= $movie->getTitle(); ?>" 
                                class="img-fluid w-100"
                                style="height: 400px; object-fit: cover;"
                            >
                        </div>
                        <div class="card-body">
                            <span class="d-flex justify-content-between">
                                <label>Titolo:</label>
                                <input type="text" name="title" 
                                value="<?= $movie->getTitle(); ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>ImageUrl:</label>
                                <input type="text" name="image" 
                                value="<?= $movie->getImage(); ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>Regista:</label>
                                <input type="text" name="director" 
                                value= "<?= $movie->getDirector(); ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>Anno:</label>
                                <input type="number" name="year" min="1950" max="2026" 
                                value= "<?= $movie->getYear(); ?>" /> 
                            </span>
                            <span class="d-flex justify-content-between">
                                <label><?=$titolo?></label>
                                <input type="text" name="genres" 
                                value= "<?=  htmlspecialchars($generi)?>" />
                            </span>
                            <span class="d-flex justify-content-end">
                                <button class="btn btn-primary mt-2" type="submit" name="submit">Aggiorna</button>
                            </span>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
