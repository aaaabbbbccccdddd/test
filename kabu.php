<?php
    include_once('simple_html_dom.php');
    $tablenumber = 9; // データは9番目のテーブルにある

    // 引数取得
    $sdate = localtime(strtotime($argv[1]),TRUE);
    $c=$sdate['tm_year']+1900;
    $a=$sdate['tm_mon']+1;
    $b=$sdate['tm_mday'];
    $edate = localtime(strtotime($argv[2]),TRUE);
    $f=$edate['tm_year']+1900;
    $d=$edate['tm_mon']+1;
    $e=$edate['tm_mday'];
    $stock = $argv[3];

    // HTML取得
    // http://table.yahoo.co.jp/t?c=2010&a=11&b=1&f=2010&d=11&e=7&g=d&s=9631&y=0&z=&x=sb
    $url = "http://table.yahoo.co.jp/t?c=$c&a=$a&b=$b&f=$f&d=$d&e=$e&g=d&s=$stock&y=0&z=&x=sb";
    $html = file_get_html($url);

    // CSV表示
    $table = $html->find('table',$tablenumber);
    foreach( $table->find('tr') as $tr ){
        $arr = array();
        foreach( $tr->find('td,th') as $td ){
            $tmp = $td->plaintext;
            $tmp = mb_convert_encoding($tmp,'UTF-8','EUC-JP');
            $tmp = str_replace(',','',$tmp);
            $arr[] = $tmp;
        }
        $str = implode(',',$arr);
        echo "$str\n";
    }