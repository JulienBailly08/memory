<?php
include_once 'config.php';

if (isset($_POST['player'])):
    $player=$_POST['player'];
endif;

if (isset($_POST['nbOfMove'])):
    $nbOfMove=$_POST['nbOfMove'];
endif;


if(isset($player) && isset($nbOfMove)):
    $request = "INSERT INTO score (name,nbOfMove) VALUES ('{$player}','{$nbOfMove}')";

    try{
        $bdd= new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",$DB_USER,$DB_PASSWORD); 
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req= $bdd->prepare($request);
        $req->execute();  
        $req->closeCursor();
   
    }         
    catch(PDOException $e){
 
            echo('Erreur : '.$e->getMessage());
        
    }
 
endif;


    try{
        $bdd= new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",$DB_USER,$DB_PASSWORD); 
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = ('SELECT name,nbOfMove FROM score ORDER BY nbOfMove LIMIT 5;');
        $req= $bdd->prepare($sql);
        $req->execute();  
        $highScores=$req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
                  
    }         
    catch(PDOException $e){
 
            echo('Erreur : '.$e->getMessage());
        
    }









