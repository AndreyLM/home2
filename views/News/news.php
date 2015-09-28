<?php foreach ($items as $key=>$value) :?>
    <h1><?php echo $value->title; ?></h1>
    <p><?php echo $value->text; ?></p>
    <p><?php echo $value->created_date; ?></p>
    <p><a href="/home2/News/GetOne?id=<?php echo $value->id; ?>">Read more...</a></p>
<?php endforeach; ?>