<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <h1>
            Lord Of Geek
        </h1>
        <h2>
            le prince des jeux sur internet
        </h2>
        <h2>
            tous les jeux du site
        </h2>

        <a href="index.php?uc=visite&action=trierParPrix">trier par prix</a>


        <section>


            <form class="recherché" name="fo" method="get" action="">
                <input type="text" name="keywords" placeholder="Mots-clés" />
                <input type="submit" value="rechercheConsole" name="action" />
            </form>



            <!-- <a href="index.php?uc=visite&action=rechercheJeux">jeux</a> -->
        </section>


        <section id="jeux">

            <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                <?php
                $array = [
                    "lundi" => "",
                    "mardi" => "",
                    "mercredi" => "",
                    "jeudi" => "aujourd'hui tout est à -50%",
                    "vendredi" => "",
                ];

                foreach ($array as $day => $hours) {
                    echo '<li class="list-unstyled list-hours-item d-flex">' . $day . '<span class="ms-auto">' . $hours . '</span></li>';
                }
                ?>
            </ul>

            <section class="jeux">
                <?php
                foreach ($lesJeux as $unJeu) {
                    $id = $unJeu['id'];
                    $description = $unJeu['description'];
                    $etat = $unJeu['etat'];
                    $prix = $unJeu['prix'];
                    $detail = $unJeu['detail'];
                    $image = $unJeu['image'];
                    $console = $unJeu['console_id'];
                ?>

                    <article>
                        <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" />
                        <p><?= $description ?></p>
                        <p><?= $etat ?></p>
                        <p><?= $detail ?></p>
                        <p><?= $console ?></p>
                        <?php
                        if (date("l") == "Thursday") :
                        ?>
                            <p> Prix :<s> <?= $prix ?> Euros </s> <?= $prix / 2 ?>Euros</p>
                        <?php
                        else :
                        ?>
                            <p> Prix : <?= $prix ?> Euros</p>
                        <?php
                        endif;
                        ?>
                        <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                            <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add" />
                        </a>
                    </article>
                <?php
                }
                ?>
            </section>
        </section>

        <script src="js/main.js"></script>
</body>

</html>