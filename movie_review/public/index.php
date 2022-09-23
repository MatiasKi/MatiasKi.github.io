<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');
//css, tietosivu eli "kirjautumalla pääset Lisäämään uuden elokuvan", kuvat 
$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/movieManagement.php';
require_once 'controllers/reviewManagement.php';

switch($route) {
    case "/":
        viewMoviesController();
    break;

    case "/register":
        registerController();
    break;

    case "/login":
        loginController();
    break;

    case "/logout":
        logoutController();
    break;

    case "/add_movie":
        if(isLoggedIn()){
          addMovieController();
        } else {
          loginController();
        }
      break;

      case "/delete_movie":
        if(isLoggedIn()){
          deleteMovieController();
        } else {
          loginController();
        }
    break;

    case "/update_movie":
      if(isLoggedIn()){
        if($method == "get"){
          editMovieController();
        } else {
          updateMovieController();
        }
      } else {
        loginController();
      }
    break;

    case "/add_review":
      if(isLoggedIn()){
        addReviewController();
      } else {
        loginController();
      }
    break;

    case "/view_reviews":
      viewReviewsController();
    break;

    case "/delete_review":
      if(isLoggedIn()){
        deleteReviewController();
      } else {
        loginController();
      }
  break;

    default:
      echo "404";
}