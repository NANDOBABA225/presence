<?php include_once "connexion.php";  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form">
        <a href="INDEX.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <p class="erreur_message">
           <?php 
                if(isset($_POST["button"])){
                            $req = $db->prepare("UPDATE Participants SET Nom = ?, Prenom=?,Numerophone=?,Email=? WHERE ID= ?");
                            if($req->execute(array($_POST["nom"],$_POST["prenom"],$_POST["numero"],$_POST["mail"],$_POST["id"]))){
                            //si la requête a été effectuée avec succès , on fait une redirection
                        $req->closeCursor();
                                header("location: INDEX.php");
                            }else {//si non
                                $message = "Participant non ajouté";
                            }
            
                    } 


              if(isset($message)){
                  echo $message ;
              }
              $req = $db->prepare("SELECT * FROM Participants WHERE ID=?");
              $req-> execute(array($_GET['ID']));
              $row = $req->fetchAll(PDO::FETCH_OBJ);
              foreach ($row as $value):?>

        </p>
        <form action="modificateur.php" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$value->Nom?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$value->Prenom?>">
            <label>Numero Telephone</label>
            <input type="number" name="numero" value="<?=$value->Numerophone?>">
            <label>Email</label>
            <input type="text" name="mail" value="<?=$value->Email?>">
            <input type="hidden" name="id" value="<?=$_GET['ID']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
        <?php endforeach; ?>
    </div>
</body>
</html>