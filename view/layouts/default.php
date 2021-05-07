<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Blog</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>

<body>
<div id="wrapper">
    <?php include_once ROOT."/view/layouts/header.php";?>
    <div id="content">
        <div class="container">
            <div class="row">
                <?php include ROOT."/view/".$this->path.".php"; ?>
                <section class="content__right col-md-4">
                    <?php include_once ROOT."/view/layouts/sidebar.php";?>
                </section>
            </div>
        </div>
    </div>
    <?php include_once ROOT."/view/layouts/footer.php";?>
</div>

</body>
</html>