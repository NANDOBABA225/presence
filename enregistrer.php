<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <?php
       

                include_once "connexion.php";
                //requête d'ajout
                if(isset($_POST["button"])){
                    $req = $db->prepare("INSERT INTO Participants(Nom, Prenom,Numerophone,Email) VALUES(?,?,?,?)");;
                    

                if($req->execute(array($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"]))){
                //si la requête a été effectuée avec succès , on fait une redirection
			$req->closeCursor();
                    header("location: INDEX.php");
                }else {//si non
                    $message = "Participant non ajouté";
                }

		}    
    ?>

 <div class="form">
        <a href="INDEX.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Enregistrer un participant</h2>
        <p class="erreur_message">

            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="enregistrer.php" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prenom</label>
            <input type="text" name="prenom">
            <label>Numerophone</label>
            <input type="tel" name="telephone">
            <label>Email</label>
            <input type="email" pattern=".+@gmail.com" size="30"name="mail">
            <input type="submit" value="Enregistrer" name="button">
        </form>
    </div>
</body>
</html>