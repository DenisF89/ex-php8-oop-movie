<?php

$metodo = "3° METODO: PHP-ARRAY DI OGGETTI";

$genres = [
        'Drammatico' => $drammatico = new Genre("Drammatico"),
        'Romantico' => $romantico = new Genre("Romantico"),
        'Crime' => $crime = new Genre("Crime"),
        'Fantascienza' => $fantascienza = new Genre("Fantascienza"),
        'Azione' => $azione = new Genre("Azione")
];

$titanic = new Movie(
    "Titanic", 
    "James Cameron", 
    "https://upload.wikimedia.org/wikipedia/en/1/18/Titanic_%281997_film%29_poster.png", 
    1997, 
    [$drammatico,$romantico]
);

$pulpfiction = new Movie(
    "Pulp Fiction",
    "Quentin Tarantino",
    "https://upload.wikimedia.org/wikipedia/ro/8/82/Pulp_Fiction_cover.jpg",
    1994,
    [$crime, $drammatico]
);

$inception = new Movie(
    "Inception",
    "Christopher Nolan",
    "https://upload.wikimedia.org/wikipedia/en/2/2e/Inception_%282010%29_theatrical_poster.jpg",
    2010,
    [$fantascienza, $azione]
);
$matrix = new Movie(
    "The Matrix",
    "The Wachowskis",
    "https://upload.wikimedia.org/wikipedia/en/d/db/The_Matrix.png",
    1999,
    [$fantascienza, $azione]
);
$padrino = new Movie(
    "The Godfather",
    "Francis Ford Coppola",
    "https://m.media-amazon.com/images/M/MV5BNGEwYjgwOGQtYjg5ZS00Njc1LTk2ZGEtM2QwZWQ2NjdhZTE5XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg",
    1972,
    [$crime, $drammatico]
);

$movies = [$titanic, $pulpfiction, $inception, $matrix, $padrino];

?>