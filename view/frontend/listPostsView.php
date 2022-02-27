
<?php $title='Mon blog'?>
    <?php ob_start();?>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>

        <?php 
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em> <?=  $data['creation_date_fr'] ?></em>
                </h3>

                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="../index.php?id=<?=$data['id']?>&action=post">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        
$posts->closeCursor();?>
<!--Comme ce contenu est un peu gros, 
#on utilise une astuce pour le mettre dans une variable. On appelle la fonction ob_start() (ligne 3) 
##qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, 
#on récupère le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .-->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
            