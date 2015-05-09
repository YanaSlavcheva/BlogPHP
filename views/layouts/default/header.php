<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <title><?php echo htmlspecialchars($this->title) ?></title>
</head>

<body>
    <header>
        <a href="/"><img src="/content/images/site-logo.png"></a>
        <ul class="menu">
            <li><a href="/posts">Yana Slavcheva's Blog</a></li>
        </ul>
    </header>
    <?php include_once('views/layouts/messages.php'); ?>
