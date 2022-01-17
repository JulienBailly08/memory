<?php

function BDDconnection($sql){
include_once 'config.php';
    try{
        $bdd= new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",$DB_USER,$DB_PASSWORD); 
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req= $bdd->prepare($sql);
        $req->execute();  
        $result=$req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $result;           
    }         
    catch(PDOException $e){
 
            echo('Erreur : '.$e->getMessage());
        
    }
}

$highScores = BDDconnection('SELECT name,nbOfMove FROM score ORDER BY nbOfMove LIMIT 5;');

