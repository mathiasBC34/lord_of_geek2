<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>    
    <form class="insertCompte" name="fos" method="post" action="index.php?uc=administrer&action=insertCompte">
        <div style="display: flex;display: flex;flex-direction: column;align-items: center;">
            
            <label for="">Nom : 
            <input type="text" name="Nom" class="vue_inscrip" style="margin-top: 15px; width:70%;" placeholder="nom"></label>

            <label for="">Prenom :
            <input type="text" name="Prenom" class="vue_inscrip" style="margin-top: 15px; width:70%;" placeholder="prenom"></label>   

            <label for="">Mail : 
            <input type="text" name="Mail" class="vue_inscrip" style="margin-top: 15px; width:70%;" placeholder="mail ex: j.simpson@gmail.com"></label>    
            
            <label for="">ville :
            <input type="text" name="ville" class="vue_inscrip" style="margin-top: 15px; width:70%; " placeholder="ville"></label>   
            
            <label for="">cp :
            <input type="text" name="cp" class="vue_inscrip" style="margin-top: 15px; width:70%; " placeholder="code postal"></label>   
            
            <label for="">Mdp :
            <input type="text" name="Mdp" class="vue_inscrip" style="margin-top: 15px; width:70%; " placeholder="mots de passe"></label>

            <input type="submit" name="action" value="créer compte" class="vue_inscrip" style="margin-top: 15px;">
        </div>
    </form>
</body>

</html>