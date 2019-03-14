<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>用户登录</title>
</head>
<body>
<form action="" method="post">
    
    
    <?php echo csrf_field(); ?>
    <p>
        <input type="text" name="username" id="">
    </p>
    <p>
        <input type="text" name="password" id="">
    </p>
    <p>
        <input type="submit" value="登录">
    </p>
</form>
</body>
</html>