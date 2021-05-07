<?php
?>
<section class="content__left col-md-8">
    <div class="block">
        <a href="/articles">All Articles</a>
        <h3>New articles</h3>
        <div class="block__content">
            <div class="articles articles__horizontal">
                <?php
                $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` != 4 ORDER BY `id` DESC LIMIT 10");

                while ($article = mysqli_fetch_assoc($articles) ) {
                    ?>
                    <article class="article">
                        <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image']; ?>);"></div>
                        <div class="article__info">
                            <a href="/article/show/<?php echo $article['id'];?>"><?php echo $article['title'];?></a>
                            <div class="article__info__meta">
                                <small>Category: <a href="/articles/category/<?php echo $article['category_id']; ?>"><?php echo $categoriesById[$article['category_id']];?></a></small>
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
    <?php foreach($categoriesById as $categoryId=>$categoryName) { ?>
        <div class="block">
            <a href="/articles/category/<?php echo $categoryId ?>">Related Articles</a>
            <h3><?php echo $categoryName." [Newest]"; ?></h3>
            <div class="block__content">
                <div class="articles articles__horizontal">
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = $categoryId ORDER BY `id` DESC LIMIT 10");
                    while ($article = mysqli_fetch_assoc($articles) ) {
                        ?>
                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image']; ?>);"></div>
                            <div class="article__info">
                                <a href="/article/show/<?php echo $article['id'];?>"><?php echo $article['title'];?></a>
                                <div class="article__info__meta">
                                    <small>Category: <a href="/articles/category/<?php echo $article['category_id']; ?>"><?php echo $categoriesById[$article['category_id']];?></a></small>
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
    <?php } ?>
</section>