<?php include_once 'php/db.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory :D</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="body">
    
    <div class="container">
        <div class="row">
            <div class="col-12">
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
            </div>
            <div class="col-12 col-md-10">
                <div class="row row-cols-5" id="aireJeu"></div>               
            </div>
            <div class="col-12 col-md-2">
                <button class="mt-3" id="play">Lancer la partie</button>
                <p class="mt-3" id=infos></p>
            </div>
        </div>
    </div>     
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>