<?php

//http://www.php-labo.net/tutorial/example/message.html

if ($_POST['message'] == '') {
  exit('error');
}

$message = $_POST['message'];
$now     = date('Y/m/d H:i');

$post_data = "$message ($now)\n";
$read_data = file_get_contents('message.txt');

file_put_contents('message.txt', $post_data . $read_data);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一言</title>
</head>
<body>
<p>メッセージを投稿しました。</p>
<ul>
  <li><a href="index.php">一覧へ戻る</a></li>
</ul>
</body>
</html>