<html>
<head>
</head>
<body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
/*
//echo 'Hello world from Cloud9!';
print 'Hello world from Cloud9!';
print '<br><br>';
*/
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}
if(PHP_VERSION_ID < 50207)
{
    define('PHP_MAJOR_VERSION',   $version[0]);
    define('PHP_MINOR_VERSION',   $version[1]);
    define('PHP_RELEASE_VERSION', $version[2]);

    // などなど
}
printf("PHP version: %s\n", PHP_VERSION_ID);
print '<br><br>';

?>

<?php
/*
$link = mysql_connect('localhost', 'tomneko', '9d873292bb14f01d7f06');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
printf("MySQL server version: %s\n", mysql_get_server_info());
*/
//printf("MySQL server version: %s\n", mysql_query("SELECT VERSION() as mysql_version"));
//printf("\n");
?>

<?php
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
?>

<?php
/*
$dbconn = pg_connect("host=localhost port=5432 dbname=mary")
     or die("Could not connect");
     
$v = pg_version($dbconn);
  
//echo $v['client'];
printf("PostgreSQL server version: %s\n", $v['client']);
printf("\n");
*/
?>


<?php
//echo shell_exec('du -sh');
print shell_exec('du -sh');
print '<br><br>';
?>

<?php
$path = realpath(dirname());
$size = getDirSize($path); 
//echo number_format($size) . ' byte used.';
print number_format($size) . ' byte used.';
print '<br><br>';

//引数 $pathにはディレクトリ、またはファイルの絶対パスを指定。 
function getDirSize($path) { 
  $total_size = 0; 

  //指定したのがファイルだった場合はサイズを返して終了。 
  if (is_file($path)) { 
    return filesize($path); 

  } elseif (is_dir($path)) { 
    $basename = basename($path); 

    //カレントディレクトリと上位ディレクトリを指している場合はここで終了。 
    if ($basename == '.' || $basename == '..') { 
      return 0; 
    } 

    //ディレクトリ内のファイル一覧を入手。 
    $file_list = scandir($path); 

    foreach ($file_list as $file) { 
      //ディレクトリ内の各ファイルを引数にして、自分自身を呼び出す。 
      $total_size += getDirSize($path .'/'. $file); 
    } 
    return $total_size; 

  } else { 
    return 0; 
  } 
} 
?>

<?php
phpinfo()
?>
</body>
</html>
