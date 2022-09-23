<!DOCTYPE html>
<html lang="fi">
<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/elokuvat.css" type="text/css">
</head>
<body>
<script>
    function confirmDelete(movieID) {
        const answer = confirm("Haluatko varmasti poistaa?");
        if(!answer){
            document.getElementById('deleteMovies' + movieID).href = '/';
        }
        return answer;
    }
</script>
    <header>
        <h1>Elokuva-arvostelusivusto</h1>
    </header>
<nav>
    <ul class="navbar">
        <li class="navbutton"><a href="/">Katso Elokuvat</a></li>
        <?php if(!isLoggedIn()): ?>
           <li class="navbutton"><a href="/login">Kirjaudu</a></li> 
           <li class="navbutton"><a href="/register">Rekisteröidy</a></li>
        <?php else: ?>
           <li class="navbutton"><a href="/add_movie">Uusi elokuva</a></li>
           <li class="navbutton"><a href="/logout">Kirjaudu ulos</a></li>
        <?php endif ?>

    </ul>
</nav>