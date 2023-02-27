<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="insert_jeu">ici on insert les nouveaux jeux</h1>


    <section>
        <form class="insert" name="fo" method="post" action="index.php?uc=creation&action=insert">
            <label for="">Description :
            <input class="int" type="text" name="descrip" placeholder="description" /></label>
            <label for="">prix :
            <input class="int" type="text" name="prix" placeholder="prix" /></label>
            <label for="">image :
            <input class="int" type="file" name="img" placeholder="image" />
            </label>

            <label for="">categorie :
            <select class="int" name="categorie_id">
                <?php
                foreach ($lesCategories as $categorie) {
                    ?>
                        <option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
                    <?php
                }
                ?>
            </select></label>

            <label for="">etat :
            <input class="int" type="text" name="etat" placeholder="etat = intacte, bon ou mauvais" /></label>
            <label for="">detail :
            <input class="int" type="text" name="detail" placeholder="detail" /></label>
            <label for="">console :
                <select class="int" name="console_id">
                <?php
                foreach ($lesConsoles as $console) {
                    ?>
                        <option value="<?=$console['id']?>"><?=$console['nom']?></option>
                    <?php
                }
                ?>
            </select></label>



            <input class="int" type="submit" value="insert_jeu" name="action" />
         
        </form>

    </section>
</body>

</html>