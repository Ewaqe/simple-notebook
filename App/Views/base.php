<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <div class="flexbox">
        <nav>
            <a class="logotype" href="/">
                Notebook
            </a>
            <a class="note-add" href="/createNote">Add note</a>
        </nav>
        <div class="content">
            <?php require_once $endpointPath ?>
        </div>
    </div>
</body>
</html>