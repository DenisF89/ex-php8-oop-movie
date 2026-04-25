<?php

function cicle($data){

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

    return ['movies' => $movies,
            'genres' => $genres];
}
?>