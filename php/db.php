<?php
include_once 'config.php';

if (isset($_POST['player'])):
    $player=htmlspecialchars($_POST['player']);
endif;

if (isset($_POST['nbOfMove'])):
    $nbOfMove=htmlspecialchars($_POST['nbOfMove']);
endif;


if(isset($player) && isset($nbOfMove)):
    $request = "INSERT INTO score (name,nbOfMove) VALUES (?,?)";

    try{
        $bdd= new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",$DB_USER,$DB_PASSWORD); 
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req= $bdd->prepare($request);
        $req->execute($player,$nbOfMove);  
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
        
    }?>

    <h3 class="text-white">Maitre incontesté : <?php echo($highScores[0]->name)?> en <?php echo($highScores[0]->nbOfMove)?> mouvements</h3>
                <p class="text-white"> Autres Champions :</p>
                <ul>
                <?php
                    for($i=1;$i<=4;$i++):
                    ?>
                    <li class="text-white"><?php echo($highScores[$i]->name)?> en <?php echo($highScores[$i]->nbOfMove)?> mouvements</li>
                    <?php
                    endfor;
                ?>
                </ul>









