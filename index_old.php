<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一言</title>
</head>
<body>
<form action="regist.php" method="post">
  メッセージ：<br />
  <input type="text" name="message" size="50" value="" /><br />
  <br />
  <input type="submit" value="投稿する" />
</form>
<?php

//http://www.php-labo.net/tutorial/example/message.html

$fp = fopen('message.txt', 'r');
while ($line = fgets($fp)) {
  echo '<p>' . htmlspecialchars($line, ENT_QUOTES) . "</p>\n";
}
fclose($fp);

?>
</body>
</html>