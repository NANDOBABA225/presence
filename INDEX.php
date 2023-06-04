<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la liste de presence</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="enregistrer.php" class="Btn_add"> <img src="images/plus.png">Enregistrer</a>
         <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Numero de Telephone</th>
                <th>Email</th>
                <th>Modifier</th>
             </tr>

             <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des participants
                $req = $db->prepare("SELECT * FROM Participants");
		    $req->execute();
                $row = $req->fetchAll(PDO::FETCH_OBJ);
                foreach ($row as $value):?>
                        <tr>
                            <td><?=$value->Nom?></td>
                            <td><?=$value->Prenom?></td>
                            <td><?=$value->Numerophone?></td>
                            <td><?=$value->Email?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modificateur.php?ID=<?=$value->ID?>"><img src="images/pen.png"></a></td>
                        </tr>
                        <?php endforeach; ?>
            
      
         
        </table>
        

   
   
   
   
    </div>
</body>
</html>