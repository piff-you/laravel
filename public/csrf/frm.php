<?php
session_start();
// session在服务器端
if (is_null($_SERVER['HTTP_REFERER'])) {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = str_shuffle(md5(time()));
    }
}else{
    $_SESSION['token'] = str_shuffle(md5(time()));
}


if ($_POST['uname']) {
    if ($_SESSION['token'] != $_POST['token']) {
        die('非法请求');
    }
    echo $_POST['uname'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>用户登录</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="text" name="uname">
    <input type="submit" value="登录">
</form>
</body>
</html>