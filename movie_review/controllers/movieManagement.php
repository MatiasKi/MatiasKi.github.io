<?php 
require_once "database/models/movie.php";
require_once "libraries/cleaners.php";

function viewMoviesController(){
    $allmovies = getAllMovies();
    require "views/movies.view.php";
}

function addMovieController(){
    if(isset($_POST['name'], $_POST['director'], $_POST['description'], $_POST['releaseyear'], $_POST['imageurl'], $_POST['trailerurl'])){
        $name = cleanUpInput($_POST['name']);
        $director = cleanUpInput($_POST['director']);
        $description = cleanUpInput($_POST['description']);
        $releaseyear = cleanUpInput($_POST['releaseyear']);
        $imageurl = cleanUpInput($_POST['imageurl']);
        $trailerurl = cleanUpInput($_POST['trailerurl']);
        $user_id = $_SESSION["user_id"];
        addMovie($name, $director, $description, $releaseyear, $imageurl, $trailerurl, $user_id);
        header("Location: /");
    } else {
        require "views/newMovie.view.php";
    }
}

function updateMovieController(){
    if(isset($_POST["name"], $_POST["director"], $_POST["description"], $_POST["releaseyear"], $_POST["imageurl"], $_POST["trailerurl"], $_POST["movieID"])){
        $name = cleanUpInput($_POST["name"]);
        $director = cleanUpInput($_POST["director"]);
        $description = cleanUpInput($_POST["description"]);
        $releaseyear = cleanUpInput($_POST["releaseyear"]);
        $movieID = cleanUpInput($_POST["movieID"]);
        $imageurl = cleanUpInput($_POST["imageurl"]);
        $trailerurl = cleanUpInput($_POST["trailerurl"]);

        try{
            updateMovie($name, $director, $description, $releaseyear, $imageurl, $trailerurl, $movieID);
            header("Location: /");
        } catch (PDOException $e){
            echo "Virhe uutista päivittäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function editMovieController(){
    try{
        if(isset($_GET["id"])){
            $movieID = cleanUpInput($_GET["id"]);
            $movies = getMovieById($movieID);
        } else {
            echo "Virhe: id puuttuu";
        }
    } catch (PDOException $e){
        echo "Virhe elokuvaa haettassa: " . $e->getMessage();
    }

    if($movies){
        $movieID = $movies["movieID"];
        $name = $movies["name"];
        $director = $movies["director"];
        $description = $movies["description"];
        $releaseyear = $movies["releaseyear"];
        $imageurl = $movies["imageurl"];
        $trailerurl = $movies["trailerurl"];
        
        require "views/updateMovie.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function deleteMovieController(){
    try {
        if(isset($_GET["id"])){
            $movieID = cleanUpInput($_GET["id"]);
            deleteMovie($movieID);
        } else {
            echo "Virhe: id puuttuu";
        }
    } catch (PDOException $e){
        echo "Virhe elokuvaa poistettaessa:" . $e->getMessage();
    }

    $allmovies = getAllMovies();

    header("Location: /");
    exit;
}
