<?php
require_once "database/connection.php";

function getAllReviews(){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_reviews";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addReview($stars, $review, $date, $movieID, $user_id){
    $pdo = connectDB();
    $data = [$stars, $review, $date, $movieID, $user_id];
    $sql = "INSERT INTO ht1_reviews (stars, review, date, movieID, user_id) VALUES(?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function deleteReview($reviewID){
    $pdo = connectDB();
    $sql = "DELETE FROM ht1_reviews WHERE reviewID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$reviewID]);
}

function getMoviesReviews($movieID){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_reviews WHERE movieID=? ORDER BY reviewID DESC";
    $stm= $pdo->prepare($sql);
    $stm->execute([$movieID]);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}