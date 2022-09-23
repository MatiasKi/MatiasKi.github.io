<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['name'], $_POST['email'], $_POST['password'])){
        $name = cleanUpInput($_POST['name']);
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);
       // $joindate = cleanUpInput($_POST['joindate']);
       $joindate = date("Y-m-d");

        try {
            addUser($name, $email, $password, $joindate);
            header("Location: /login");
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallentaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['name'], $_POST['password'])){
        $name = cleanUpInput($_POST['name']);
        $password = cleanUpInput($_POST['password']);

        $result = login($name, $password);
        if($result){
            $_SESSION['name'] = $result['name'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); 
        } else {
            require "views/login.view.php";
        }
    } else {
        require "views/login.view.php";
    }
}

function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    session_regenerate_id(true);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}
