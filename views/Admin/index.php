<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admit Panel</title>
</head>
<body>
    <table border="0">
        <thead>
            <th>N</th>
            <th>ID</th>
            <th>Title</th>
            <th colspan="2">Operations</th>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach($titles as $value): ?>
            <tr>
                <td><?php echo $i++.')'; ?></td>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo 'Delete'; ?></td>
                <td><?php echo 'Update'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="/home2/admin.php?Action=Add">+Add new article</a></p>
</body>
</html>

