<?php
include 'inc/db.php';
class user{

    public static function getAllUsers(){
    global $pdo;
    $stmt=$pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS) ;

    }
}