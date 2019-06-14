<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cms</title>
    <link rel="stylesheet" href="css/cms.css">
</head>
<body>
    <header>
        <h2>linfo cms</h2>
    </header>

    <main>
        <div class="navigation">
            <ul>
                <li>articles</li>
                <li>events</li>
                <li>new article</li>
                <li>new event</li>
            </ul>
        </div>
        <form action="./admin" enctype="multipart/form-data" class="add_aritcle">
            <input type="text" placeholder="title">
            <input type="file" name="a_img">
            <input type="submit" name="submit_event">
        </form>

        <form action="./admin" enctype="multipart/form-data" class="add_event">
            <input type="text">
            <textarea name="par" cols="40" rows="20" maxlength="10000"></textarea>
            <input type="file" name="a_img">
            <input type="submit" name="submit_article">
        </form>
    </main>
</body>
    <script src="js/cms.js"></script>
</html>