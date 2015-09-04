<?php foreach($article as $key=>$value): ?>
    <h1><?php echo $value->title; ?></h1>
    <p><?php echo $value->text; ?></p>
    <p><?php echo $value->created_date; ?> </p>
<?php endforeach; ?>