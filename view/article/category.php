<?php
$currentCategory = $url_id;
?>
<section class="content__left col-md-8">
    <div class="block">
        <h3><?php echo $categoriesById[$currentCategory]." [All Articles]"; ?></h3>
        <div class="block__content">
            <div class="articles articles__horizontal">
                <?php
                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = $currentCategory ORDER BY `id` DESC LIMIT 20");

                while ($article = mysqli_fetch_assoc($articles) ) {
                    ?>
                    <article class="article">
                        <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image']; ?>);"></div>
                        <div class="article__info">
                            <a href="/article/<?php echo $article['id'];?>"><?php echo $article['title'];?></a>
                            <div class="article__info__meta">
                                <small>Category: <a href="/articles/category=<?php echo $article['category_id']; ?>"><?php echo $categoriesById[$article['category_id']];?></a></small>
                            </div>
                            <div class="article__info__preview">
                                <?php
                                if(strlen($article['text'])>130) {
                                    echo mb_substr(strip_tags($article['text']), 0, 130, "utf-8")."...";
                                }
                                else {
                                    echo $article['text'];
                                }
                                ?>
                            </div>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>