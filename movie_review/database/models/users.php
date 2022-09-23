<?php 
require_once "database/connection.php";

function addUser($name, $email, $password, $joindate){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$name, $email, $hashedpassword, $joindate];
    $sql = "INSERT INTO ht1_users (name, email, password, joindate) VALUES (?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($name, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_users WHERE name=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$name]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["password"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}

function getAllUsers(){
    $pdo = connectDB();
    $sql = "SELECT * FROM ht1_users";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}
