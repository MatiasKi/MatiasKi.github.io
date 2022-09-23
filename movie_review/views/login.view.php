<?php require "partials/head.php"; ?>

<h2 class="centered">Kirjaudu sisään</h2>

<div class="inputarea">
<form  action="/login" method="post">
    <label for="name">Käyttäjänimi:</label>
    <input id="name" type="text" name="name" maxlength=30>
    <label for="password">Salasana:</label>
    <input id="password" type="password" name="password" maxlength=30>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>