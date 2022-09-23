<?php
require_once "database/connection.php";

function getAllMovies(){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_movies";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addMovie($name, $director, $description, $releaseyear, $imageurl, $trailerurl){
    $pdo = connectDB();
    $data = [$name, $director, $description, $releaseyear, $imageurl, $trailerurl];
    $sql = "INSERT INTO ht1_movies (name, director, description, releaseyear, imageurl, trailerurl) VALUES(?,?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function getMovieById($movieID){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_movies WHERE movieID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$movieID]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteMovie($movieID){
    $pdo = connectDB();
    $sql = "DELETE FROM ht1_movies WHERE movieID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$movieID]);
}

function updateMovie($name, $director, $description, $releaseyear, $imageurl, $trailerurl, $movieID){
    $pdo = connectDB();
    $data = [$name, $director, $description, $releaseyear, $imageurl, $trailerurl, $movieID];
    $sql = "UPDATE ht1_movies SET name = ?, director = ?, description = ?, releaseyear = ?, imageurl = ?, trailerurl = ? WHERE movieID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}