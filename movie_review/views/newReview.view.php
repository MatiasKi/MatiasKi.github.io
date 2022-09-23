<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää arvostelu</h2>

<div class="inputarea">
<form action="/add_review" method="post">
    <label for="stars">Tähdet: </label>
    <input id="stars" type="number" min="0" max="5" name="stars">
    <label for="review"> Arvostelu: </label>
    <textarea id="review" name="review" rows="5" cols="30"></textarea>
    <input type="hidden" id="movieID" name="movieID" value=<?=$movieID?>>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>