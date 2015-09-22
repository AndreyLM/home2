<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update article</title>
</head>
<body>
    <form action="/home2/admin.php?Action=Update" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $article->title; ?>" /><br>
        <label for="text">Text</label><br>
        <input type="text" aria-multiline="true" name="text" value="<?php echo $article->text; ?>" />
        <input type="hidden" name="id" value="<?php echo $article->id; ?>"/>
        <br><input type="submit" name="submit" value="save" />
    </form>
</body>
</html>