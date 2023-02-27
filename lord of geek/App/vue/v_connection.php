<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="connexion" name="fos" method="POST" action="index.php?uc=administrer&action=verifConnexion">
        <div style="display: flex;display: flex;flex-direction: column;align-items: center;">
            <label for="">Mail : 
            <input type="text" name="" class="vue_inscrip" style="margin-top: 15px; width:70%;" placeholder="mail ex: j.simpson@gmail.com"></label> 

            <label for="">Mdp :
            <input type="text" name="" class="vue_inscrip" style="margin-top: 15px; width:70%; " placeholder="mots de passe"></label>

            <input type="submit" value="connection" name="sub" style="margin-top: 15px; width:70%; ">
        </div>
    </form>
</body>
</html>