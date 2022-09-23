<?php require "partials/head.php"; 
$allmovies = getAllMovies();?>

<h2 class="centered">Elokuvat</h2>

<div class = "movies">
<?php
//cleanDump($allmovies);
    foreach($allmovies as $movieitem): ?>
        <div class='movieitem'>
        <h3><?=$movieitem["name"] ?></h3>
        <p>Ohjaaja: <?=$movieitem["director"]?></p>
        <p><?=$movieitem["description"]?></p>
        <p>Julkaisuvuosi: <?=$movieitem["releaseyear"]?></p>
        <h3><a href="<?=$movieitem["trailerurl"]?>" target="_blank">Trailer</a></h3>
        <div style="text-align: center;">
        <img src=<?=$movieitem["imageurl"]?>>
        <br>
        </div>
        <br>
        <?php
        if(isLoggedIn() ):
            $movieID = $movieitem["movieID"];
            $moviesid = 'deleteMovie' . $movieID; ?>
            <a id=<?=$moviesid ?> onClick='confirmDelete(<?=$movieID?>)' href='/delete_movie?id=<?=$movieID?>'>Poista</a>
            <a href='/update_movie?id=<?=$movieID?>'>Päivitä</a>
            <a href='/add_review?id=<?=$movieID?>'>Lisää arvostelu</a>
            <a href='/view_reviews?id=<?=$movieID?>'>Katso arvostelut</a>
        <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>