<?php
$categories_q = mysqli_query($connection, "SELECT * FROM `categories`");
while ($categorie = mysqli_fetch_assoc($categories_q)) { ?>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/categorie?id=<?php echo $categorie['id']?>">
            <?php echo $categorie['title'] ?>
        </a>
    </li>
<?php } ?>