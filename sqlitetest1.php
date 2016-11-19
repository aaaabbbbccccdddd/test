<html>
<head>
</head>
<body>
<?php
/*
//PDOが存在かつsqliteのドライバがある場合
if(class_exists('PDO') && in_array('sqlite', PDO::getavailabledrivers())) {
	//メモリ内にデータベースを作成し、SQLiteのバージョンを取得
	$memoryDB = new PDO('sqlite::memory:', '', '');
	$query = "SELECT sqlite_version();";
	$result = $memoryDB->query($query);
	$SQLiteVersion = $result->fetchColumn();
	unset($memoryDB, $result,$query);
}
//echo "SQLiteVersion".$SQLiteVersion;
printf("SQLiteVersion".$SQLiteVersion);
print '<br><br>';
*/

//  開始 sqlite3 test.db
//  終了 .quit/.exit

//$link = sqlite_open('test.db', 0666, $sqliteerror);
$link = sqlite_open('message.db', 0666, $sqliteerror);
if (!$link) {
    die('接続失敗です。'.$sqliteerror);
}

print('接続に成功しました。<br>');

// SQLiteに対する処理

sqlite_close($link);

print('切断しました。<br>');

?>
</body>
</html>
