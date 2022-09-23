<?php require "partials/head.php"; ?>

<h2 class="centered"> Rekisteröidy</h2>

<div class="inputarea">
<form action="/register" method="post">
    <label for="name">Nimi:</label>
    <input id="name" type="text" name="name" maxlength=30>
    <label for="email">Sähköposti:</label>
    <input id="email" type="text" name="email">
    <label for="password">Salasana:</label>
    <input id="password" type="password" name="password" maxlength=30>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>