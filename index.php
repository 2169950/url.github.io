<?php
// 假设正确的密码是 "secret"，您应该使用更安全的方式存储和验证密码
$correctPassword = isset($_GET['pass']) ? $_GET['pass'] : null;

// 获取URL参数
$url = isset($_GET['url']) ? $_GET['url'] : null;

// 检查是否提供了网址
if ($url === null) {
    die("系统异常：没有提供url值。");
}

if ($correctPassword === null) {
    die("系统异常：没有提供pass值。");
}

// 检查用户是否同意了隐私协议
if (isset($_POST['agree'])) {
    // 检查密码是否正确
    if ($_POST['password'] === $correctPassword) {
        // 密码正确，重定向到提供的网址
        header("Location: http://" . $url);
        exit;
    } else {
        // 密码错误，显示错误信息
        echo "密码错误，请重新输入。";
    }
}

// 显示表单让用户输入密码
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码验证</title>
</head>
<body>
    <form action="" method="post">
        <input type="password" name="password" placeholder="请输入密码" required>
        <input type="checkbox" id="agree" name="agree" required>
        <label for="agree">我同意用户协议</label>
        <a href="http://know.cnxyhh.cn/urltzxy.html">查看用户协议</a>
        <input type="submit" value="提交">
    </form>
</body>
</html>
