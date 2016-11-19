<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP TEST</title>
</head>
<body>

<?php

/*
# MySQLを起動する
$ mysql-ctl start

#  MySQLを停止する
$ mysql-ctl stop

# MySQLの対話式クライアントを起動する
$ mysql-ctl cli
終了 \p


show databases;
use database名;
drop database database名;


*/

//$link = mysql_connect('localhost', 'testuser', 'testuser');
$link = mysql_connect('localhost', 'root');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

print('<p>接続に成功しました。</p>');


mysql_set_charset('utf8');

$DbName = 'message';
$TblName = 'messages';

//$result = mysql_query('create database message');
$result = mysql_query('create database '.$DbName.' CHARACTER SET sjis');
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

//print('<p>uriageデータベースを選択しました。</p>');
print('<p>'.$DbName.'データベースを作成しました。</p>');

//$db_selected = mysql_select_db('uriage', $link);
$db_selected = mysql_select_db($DbName, $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

//print('<p>uriageデータベースを選択しました。</p>');
print('<p>'.$DbName.'データベースを選択しました。</p>');


/*
CREATE TABLE messages(
  no      INT AUTO_INCREMENT PRIMARY KEY,
  name    VARCHAR(255),
  message TEXT,
  created DATETIME
);
*/
$Sql = 'CREATE TABLE '.$TblName.'(no INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), message TEXT, created DATETIME);';
$result = mysql_query($Sql);
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

//print('<p>uriageデータベースを選択しました。</p>');
print('<p>'.$TblName.'テーブルを作成しました。</p>');

$Sql2 = 'INSERT INTO '.$TblName.'(name, message, created) VALUES(\'名前\', \'メッセージ\', \'2011-01-02 13:40:16\');';
//$Sql2 = 'INSERT INTO '.$TblName.' VALUES(NULL, '名前', 'メッセージ', '2011-01-02 13:40:16');';
$result = mysql_query($Sql2);
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

//print('<p>uriageデータベースを選択しました。</p>');
print('<p>'.$TblName.'データを追加しました。</p>');

//$result = mysql_query('SELECT id,name FROM shouhin');
$result = mysql_query('SELECT * FROM '.$TblName);
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

while ($row = mysql_fetch_assoc($result)) {
    print('<p>');
//    print('id='.$row['id']);
//    print(',name='.$row['name']);
    print('name='.$row['name']);
    print(',message='.$row['message']);
//    print(',DATETIME='.$row['DATETIME']);
    print('</p>');
}

/*
//$result = mysql_query('drop database message');
$result = mysql_query('drop database '.$DbName);
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

//print('<p>uriageデータベースを選択しました。</p>');
print('<p>'.$DbName.'データベースを削除しました。</p>');
*/

// MySQLに対する処理

$close_flag = mysql_close($link);

if ($close_flag){
    print('<p>切断に成功しました。</p>');
}

?>
</body>
</html>