<?php

//importo classi e traits
require_once './Traits/HasGenres.php';
require_once './Models/Genre.php';
require_once './Models/Movie.php';
include_once './data/db.php';
include_once './functions/cicle.php';

session_start();

$id = $_GET['id'] ?? header("Location: index.php");

if (!isset($_SESSION['movies'], $_SESSION['genres'])) {
    ['movies' => $movies, 'genres' => $genres] = cicle($data);

    $_SESSION['movies'] = $movies;
    $_SESSION['genres'] = $genres;
}

$movies = $_SESSION['movies'];
$genres = $_SESSION['genres']; 


$movie = $movies[$id] ?? header("Location: index.php");

if(isset($_POST['submit']))
    {
        $movie->titolo = $_POST['title'];
        $movie->regista = $_POST['director'];
        $movie->locandina = $_POST['image'];
        $movie->anno = $_POST['year'];

        $array = array_filter(array_map('trim',explode(",", $_POST['genres'])));
        $newGenres = [];
        foreach($array as $genre){
             if (!isset($genres[$genre])) {
                $genres[$genre] = new Genre($genre);
             }
            $newGenres[] = $genres[$genre];
        }

        $movie->generi = $newGenres;

        $movies[$id] = $movie;
        $_SESSION['movies'] = $movies;
        $_SESSION['genres'] = $genres;

        header("Location: index.php");
        exit;
    }
    

    $string = $movie->getGenres(); 
    $pos = strpos($string, "</b>");
    $titolo = substr($string,0,$pos+4);
    $generi = substr($string,$pos+4);
    $pos
                                
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
                                src="<?= $movie->locandina; ?>" 
                                alt="<?= $movie->titolo; ?>" 
                                class="img-fluid w-100"
                                style="height: 400px; object-fit: cover;"
                            >
                        </div>
                        <div class="card-body">
                            <span class="d-flex justify-content-between">
                                <label>Titolo:</label>
                                <input type="text" name="title" 
                                value="<?= $movie->titolo; ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>ImageUrl:</label>
                                <input type="text" name="image" 
                                value="<?= $movie->locandina; ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>Regista:</label>
                                <input type="text" name="director" 
                                value= "<?= $movie->regista; ?>" />
                            </span>
                            <span class="d-flex justify-content-between">
                                <label>Anno:</label>
                                <input type="number" name="year" min="1950" max="2026" 
                                value= "<?= $movie->anno; ?>" /> 
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
