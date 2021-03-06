<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars($this->title) ?></title>

        <link href="/content/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <script src="/content/bootstrap/js/bootstrap.js"></script>
        <link href="/content/styles/styles.css" rel="stylesheet" />
        <script src="/content/scripts/libs/mustache.js-2.0.0/mustache.js"></script>

        <meta name="Yana Slavcheva's Blog" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header class="row blog-header">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <a href="/"><img class="header_image" src="/content/images/background.jpg"></a>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-8">
                <h1 class="blog-header-text inline-block"><a href="/posts">Yana Slavcheva's Blog</a></h1>
                <h1 class="blog-header-text inline-block"><a href="/user">About</a></h1>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-4">
                <?php if(! $this -> isLoggedIn()) : ?>
                    <h1 class="blog-header-text inline-block"><a href="/user/login">Login</a></h1>
                    <h1 class="blog-header-text inline-block"><a href="/user/register">Register</a></h1>
                <?php endif ?>

                <?php if($this -> isLoggedIn()) : ?>
                    <h1 class="blog-header-text inline-block"><a href="">Hello, <?php echo $_SESSION['username'] ?></a></h1>
                    <h1 class="blog-header-text inline-block"><a href="/user/logout">Logout</a></h1>
                <?php endif ?>

            </div>
        </header>
        <?php include_once('views/layouts/messages.php'); ?>

        <div class="row wrapper">
            <section class="col-xs-12 col-md-6 col-lg-8">
