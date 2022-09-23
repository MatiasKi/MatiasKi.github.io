<?php require "partials/head.php";
?>

<h2 class="centered">Arvostelut</h2>

<div class="reviews">
<?php
    foreach($allreviews as $reviewitem): ?>
    <div class="reviewitem">
    <h3><?=$reviewitem["stars"]?>/5</h3>
    <p><?=$reviewitem["review"]?></p>
    <p>Päivämäärä: <?php echo date("d.m.Y",strtotime($reviewitem["date"]));?></p>
    <?php
    if(isLoggedIn() ):
        $reviewID = $reviewitem["reviewID"];
        $reviewsid = "deleteReview" . $reviewID; ?>
        <a id=<?=$reviewsid ?> onClick='confirmDelete(<?=$reviewID?>)' href='delete_review?id=<?=$reviewID?>'>Poista</a>
        <?php endif; ?>
    </div>
    <?php endforeach ?>
    </div>
    
    <?php require "partials/footer.php"; ?>