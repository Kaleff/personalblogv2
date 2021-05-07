<?php include_once ROOT."/components/DB.php";?>
<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $GLOBALS['Web_Title']; ?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/">Main Page</a></li>
                    <li><a href="/contact">About Me & Contact Information</a></li>
                    <li><a href="<?php echo $GLOBALS['LI_url']; ?>" target="_blank">My LinkedIn</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    $connection = DB::getConnection();
    $categories = mysqli_query($connection, "SELECT * FROM `articles_categories`");
    ?>
    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php
                        while($category = mysqli_fetch_assoc($categories) )
                        {
                            $categoriesById[$category['id']] = $category['title'];
                            echo "<li><a href='/articles/category/".$category['id']."'>".$category['title']."</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
