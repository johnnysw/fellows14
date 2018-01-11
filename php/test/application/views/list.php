<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/11
 * Time: 下午1:37
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach ($list as $user){?>

        <li><?php echo $user->id.",".$user->name?></li>

        <?php }?>
    </ul>
</body>
</html>


