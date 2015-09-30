<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php foreach($log as $key=>$value) :?>
        <p><?php echo $value; ?></p>
    <?php endforeach; ?>
    <p><a href="/home2/admin/Index">Beck to admin page.</a></p>
</body>
</html>