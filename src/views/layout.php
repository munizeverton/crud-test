<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD - Páginas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD - Páginas</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($content == 'list') echo 'class="active"'; ?>><a href="index.php">List</a></li>
                <li <?php if ($content == 'add') echo 'class="active"'; ?>><a href="add.php">Create</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<!-- Begin page content -->
<div class="container">
    <?php include('views/' . $content . '.php'); ?>
</div>

<div id="footer">
    <div class="container">
        <p class="text-muted">Criado por Everton Muniz - munizeverton@gmail.com</p>
    </div>
</div>

<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>
