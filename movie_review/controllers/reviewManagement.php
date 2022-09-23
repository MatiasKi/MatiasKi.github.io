<?php 
require_once "database/models/review.php";
require_once "libraries/cleaners.php";

function viewReviewsController(){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $allreviews = getMoviesReviews($id);
        //cleanDump($allreviews);
       require "views/reviews.view.php";
    } else {
        $allreviews = getAllReviews();
        require "views/reviews.view.php";
    }
   
}

/*function viewReviewsC(){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
    }
}*/

function addReviewController(){
    if(isset($_POST["stars"], $_POST["review"], $_POST["movieID"])){
        $stars = cleanUpInput($_POST["stars"]);
        $review = cleanUpInput($_POST["review"]);
        $movieID = cleanUpInput($_POST["movieID"]);
        $date = date("Y-m-d");
        $user_id = $_SESSION["user_id"];
        addReview($stars, $review, $date, $movieID, $user_id);
        header("Location: /view_reviews?id=$movieID");
    } else {
        if(isset($_GET["id"])){
            $movieID = $_GET["id"];
            require "views/newReview.view.php";
        } else {
            echo "Virhe";
        }
    }
}

function deleteReviewController(){
    try {
        if(isset($_GET["id"])){
            $reviewID = cleanUpInput($_GET["id"]);
            deleteReview($reviewID);
        } else {
            echo "Virhe: id puuttuu";
        }
    } catch (PDOException $e){
        echo "Virhe elokuvaa poistettaessa:" . $e->getMessage();
    }

    $allreviews = getAllReviews();

    header("Location: /");
    exit;
}