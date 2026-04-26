<?php

$genres = [
    'Drammatico' => $drammatico = new Genre("Drammatico"),
    'Romantico' => $romantico = new Genre("Romantico"),
    'Crime' => $crime = new Genre("Crime"),
    'Fantascienza' => $fantascienza = new Genre("Fantascienza"),
    'Azione' => $azione = new Genre("Azione"),
    'Avventura' => $avventura = new Genre("Avventura"),
    'Animazione' => $animazione = new Genre("Animazione"),
    'Fantasy' => $fantasy = new Genre("Fantasy")
];

$spiderman = new Movie(
    "Spider-Man",
    "Sam Raimi",
    "https://upload.wikimedia.org/wikipedia/en/thumb/6/6c/Spider-Man_%282002_film%29_poster.jpg/250px-Spider-Man_%282002_film%29_poster.jpg",
    2002,
    [$azione, $avventura]
);

$harrypotter = new Movie(
    "Harry Potter and the Philosopher's Stone",
    "Chris Columbus",
    "https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Harry_Potter_and_the_Philosopher%27s_Stone_banner.jpg/250px-Harry_Potter_and_the_Philosopher%27s_Stone_banner.jpg",
    2001,
    [$fantasy, $avventura]
);

$avengers = new Movie(
    "The Avengers",
    "Joss Whedon",
    "https://upload.wikimedia.org/wikipedia/en/thumb/8/8a/The_Avengers_%282012_film%29_poster.jpg/250px-The_Avengers_%282012_film%29_poster.jpg",
    2012,
    [$azione, $fantascienza]
);

$lotr = new Movie(
    "The Lord of the Rings: The Fellowship of the Ring",
    "Peter Jackson",
    "https://upload.wikimedia.org/wikipedia/en/f/fb/Lord_Rings_Fellowship_Ring.jpg",
    2001,
    [$fantasy, $avventura]
);

$toystory = new Movie(
    "Toy Story",
    "John Lasseter",
    "https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg",
    1995,
    [$animazione, $avventura]
);

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

$movies = [$spiderman, $harrypotter, $avengers, $lotr, $toystory, $titanic, $pulpfiction, $inception, $matrix, $padrino];

?>