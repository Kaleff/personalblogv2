<?php
    $connection = DB::getConnection();
    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = ".$url_id);
    if( mysqli_num_rows($articles) <= 0 ) {
        ?>
        <section class="content__left col-md-8">
            <div class="block">
                <h3>Content not found</h3>
                <div class="block__content">
                    <div class="full-text">
                        This article doesn't exist or was deleted.
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    else {
        $article = mysqli_fetch_assoc($articles);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = ".(int) $article['id']);
        ?>
        <section class="content__left col-md-8">
            <div class="block">
                <a><?php echo $article['views']; ?> views</a>
                <h2><?php echo $article['title']; ?></h2>
                <div class="block__content">
                    <img src="/static/images/<?php echo $article['image'];?>" style="max-width: 50%; max-height: 50%; position: relative; left:25%;">
                    <div class="full-text"><?echo "<br>".$article['text']?></div>
                </div>
            </div>
        </section>
    <?php
    }
?>