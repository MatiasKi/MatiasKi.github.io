<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää elokuva</h2>

<div class="inputarea">
<form action="/update_movie" method="post">
    <label for="name">Nimi: </label>
    <input id="name" type="text" name="name" value="<?=$name?>">
    <label for="director">Ohjaaja:</label>
    <input id="director" type="text" name="director" value="<?=$director?>">
    <label for="description">Kuvaus:</label>
    <textarea id="description" name="description" rows="5" cols="30"><?=$description?></textarea>
    <label for="releaseyear">Julkaisuvuosi: </label>
    <input id="releaseyear" type="number" name="releaseyear" value="<?=$releaseyear?>">
    <label for="imageurl">Kuva URL linkki: </label>
    <input id="imageurl" name="imageurl" value="<?=$imageurl?>">
    <label for="trailerurl">Trailer linkki: </label>
    <input id="trailerurl" name="trailerurl" value="<?=$trailerurl?>">
    <input type="hidden" id="movieID" name="movieID" value=<?=$movieID?>>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>